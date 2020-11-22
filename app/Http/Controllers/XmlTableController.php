<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class XmlTableController extends Controller
{
    private $regions;

    public function index(){

        $xmlFile= Storage::disk('public')->get('xml/xmlFile.xml');

        $xmlObject = simplexml_load_string($xmlFile);

        $xmlArr = json_decode(json_encode( $xmlObject), true);
    
        $xmlCollection = $this->getViewCollection($xmlArr['country']);

        $allRegions = $this->getRegions();

        return view('xmlProject.table',compact('xmlCollection','allRegions'));
    }

    public function getViewCollection($xmlArr){

        $xmlArrNew = [];
        foreach($xmlArr as $key=>$country){
            $xmlArrNew[$key]['region'] = $country['@attributes']['zone'] ?? null;
            $this->addRegion($country['@attributes']['zone']);
            $xmlArrNew[$key]['country']=$country['name'] ?? null;
            $xmlArrNew[$key]['language']=$country['language'] ?? null;
            $xmlArrNew[$key]['currency']=$country['currency'] ?? null;
            $xmlArrNew[$key]['coordinates']=$this->getLangAndLong($country['map_url']) ?? null;
        }

        return collect($xmlArrNew)->sortBy(function($country){
             return sprintf('%-12s%s', $country['region'], $country['country']);
        });
    }

    public function getLangAndLong($url){
        preg_match('/\/@(.*?)z\//',$url,$matches);

        $longLatArr = explode(',',$matches[1]);

        if(count($longLatArr)>2){
            array_pop($longLatArr);
        }
        
        return $longLatArr;   
    }

    public function addRegion($region){
        if(!in_array($region,$this->getRegions())){
            $this->regions[]=$region;
        }
    }
    
    public function getRegions(){
        return $this->regions ?? [];
    }
}
