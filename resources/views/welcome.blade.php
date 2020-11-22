<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Xml Data Table</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        @yield('styles')
    </head>
    <body>
        <header>
            <h1 class="text-center mt-8">Table that reads data from xml files</h1>
        </header>
       <section class="flex justify-center" >
            @yield('content')
       </section>

    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/xmlproject.js') }}"></script>
    </body>
</html>
