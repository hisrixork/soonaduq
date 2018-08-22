<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Soonaduq | Horaires de prières</title>

        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

        <link rel="shortcut icon" href="{{ asset('img/logo.png') }}">

        @yield('stylesheet')
    </head>
    <body>
        <div class="main text-white {{ \Carbon\Carbon::now()->dayOfWeek === -1 ? ' jum' : '' }}">
            <div class="main-bg"></div>
            <div class="main-overlay"></div>

            <div class="content">
                @yield('content')
            </div>

        </div>

        <script type="application/javascript" src="{{ asset('js/app.js') }}"></script>
        <script type="application/javascript" src="{{ asset('js/commons/online.js') }}"></script>
        <script type="application/javascript" src="{{ asset('js/index.js') }}"></script>
        <script type="application/javascript" src="{{ asset('js/home/index.js') }}"></script>
        @yield('javascript')
    </body>
</html>
