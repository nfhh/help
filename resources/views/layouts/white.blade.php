<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body{
            display: flex;
            justify-content: space-between;
            align-content: center;
            height: 100vh;
            flex-direction: column;
        }
    </style>
    @yield('css')
    </head>
<body>
    @yield('content')
    @yield('js')
</body>
</html>
