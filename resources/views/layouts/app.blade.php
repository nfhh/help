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
    <link href="{{ asset('css/my.css') }}" rel="stylesheet">
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<div id="app">

    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://img.terra-master.com/skin/frontend/base/default/images/Terramaster_logo.svg"
                     width="90" alt="" loading="lazy">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/toshelp">TOS {{ trans('help.help') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/quickguide">{{ trans('help.quickguide') }} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/faq?subject_id=1">{{ trans('help.faq') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ trans('help.download') }}</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-target="#lanModal" data-toggle="modal">
                            {{$lans[$lan]}}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="carousel" class="carousel slide w-100">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://img.terra-master.com/media/header-banner.jpg" class="mx-auto d-block img-fluid"
                     alt="">
            </div>
        </div>
    </div>

    <div class="modal fade" id="lanModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="container-fluid">
                        <div class="row py-4">
                            @foreach($lans as $k=>$v)
                                <div class="col-md-4">
                                    <a class="text-dark d-block py-2" href="javascript:;" onclick="chLan(this)"
                                       data-lan="{{ $k }}">{{ $v }}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main class="py-4 min-height">
        @yield('content')
    </main>

    <footer class="footer bg-dark p-3 text-light text-center">
        <p class="m-1">Copyright©2020 TerraMaster All Rights Reserved.</p>
    </footer>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script>
    function chLan(obj) {
        $.cookie('lan', $(obj).data('lan'), {path: '/'})
        location.reload()
    }

    $('#a-box a').each(function () {
        if ($(this).attr('href').includes(location.search)) {
            $(this).addClass('active');
        }
    });
</script>
@yield('js')
</body>
</html>
