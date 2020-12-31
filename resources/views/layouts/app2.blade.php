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
    <link href="/css/bstreeview.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2.2.1/src/js.cookie.min.js"></script>
    @yield('css')
    <style>
        .list-group-item.active {
            background-color: #dadada;
            border-color: #dadada;
        }

        nav#n-box a {
            border-left:1px solid transparent;
            border-right: 1px solid transparent;
        }

        nav#n-box a:hover {
            background-color: #dfdfdf;
            border-radius: unset;
            border-left: 1px solid #fff;
            border-right: 1px solid #fff;
        }

        nav#n-box a:first-child:hover {
            border-left: 1px solid #dfdfdf;
        }
    </style>
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
