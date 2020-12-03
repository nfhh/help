<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">
    <script src="{{ myAsset('js/app.js') }}" defer></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/js-cookie/latest/js.cookie.min.js"></script>
    @yield('css')
</head>
<body>
<div id="app">
    @include('layouts.nav')
    @include('layouts.banner')
    @include('layouts.lan')
    @include('layouts.main')
    @include('layouts.footer')
</div>
@yield('js')
@include('layouts._js')
</body>
</html>
