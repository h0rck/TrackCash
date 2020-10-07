<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon" width="135" height="48">
    <link rel="stylesheet" href="{{ asset('css/app.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>

</head>
<body>
    <div id="app">
        <div class="wrapper">
            @include('layouts.header')
        </div>
        <div class="content" style="margin-top: 50px">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>

    @yield('scripts')
</body>
</html>
