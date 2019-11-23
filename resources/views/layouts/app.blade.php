<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'WEBSYS') }}</title>

    <!-- Scripts -->

    <script src="{{ asset('js/login/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/login/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('js/login/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/login/select2/select2.min.js') }}"></script>
    <script src="{{ asset('js/login/main.js') }}"></script>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">



    <link rel="stylesheet" type="text/css" href="{{ asset('css/login/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>
    <div id="app">
       
            @yield('content')
        
    </div>
</body>
</html>
