@extends('welcome')

@section('content')
    <div class="flex mt-8 table--wrapper">
        <div class="table--row">
                <div class="table--cell ">
                        <p>Regiune</p>
                    </div>
                    <div class="table--cell">
                        <p>Tara</p>
                    </div>
                    <div class="table--cell">
                        <p>Limba</p>
                    </div>
                    <div class="table--cell">
                        <p>Moneda</p>
                    </div>
                    <div class="table--cell">
                        <p>Latitudine</p>
                    </div>
                    <div class="table--cell">
                        <p>Longitudine</p>
                    </div>
        </div>
        @foreach ($xmlCollection as $country)

        <div class="table--row">
                <div class="table--cell ">
                        <p>{{$country['region']}}</p>
                    </div>
                    <div class="table--cell">
                        <p>{{$country['country']}}</p>
                    </div>
                    <div class="table--cell">
                        <p>{{$country['language']}}</p>
                    </div>
                    <div class="table--cell">
                        <p>{{$country['currency']}}</p>
                    </div>
                    <div class="table--cell">
                        <p>{{$country['coordinates'][0]}}</p>
                    </div>
                    <div class="table--cell">
                        <p>{{$country['coordinates'][1]}}</p>
                    </div>
        </div>
        @endforeach
    </div>
@endsection