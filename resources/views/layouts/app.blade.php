<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','Best NAS Storage, RAID storage, Data Storage Master Online')_TerraMaster</title>
    <meta name="keywords" content="@yield('keywords','')"/>
    <meta name="description" content="@yield('description','')"/>
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="{{ myAsset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2.2.1/src/js.cookie.min.js"></script>
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
