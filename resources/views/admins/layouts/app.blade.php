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
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <strong>
                    TerraMaster铁威马帮助文档管理后台
                </strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @auth
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::guard('admin')->user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.admin.edit') }}">
                                    修改密码
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    退出
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container pt-3">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group" id="a-box">
                    <a href="{{ route('admin.category.index')  }}" class="list-group-item list-group-item-action">
                        TOS帮助目录管理
                    </a>
                    <a href="{{ route('admin.article.index')  }}" class="list-group-item list-group-item-action">
                        TOS帮助文章管理
                    </a>
                    <a href="{{ route('admin.product.index')  }}" class="list-group-item list-group-item-action">
                        安装指南型号管理
                    </a>
                    <a href="{{ route('admin.step.index')  }}" class="list-group-item list-group-item-action">
                        安装指南文章管理
                    </a>
                    <a href="{{ route('admin.subject.index')  }}" class="list-group-item list-group-item-action">
                        FAQ分类管理
                    </a>
                    <a href="{{ route('admin.faq.index')  }}" class="list-group-item list-group-item-action">
                        FAQ问答管理
                    </a>
                    <a href="{{ route('admin.download.index')  }}" class="list-group-item list-group-item-action">
                        下载管理
                    </a>
                    <a href="{{ route('admin.feedback.index')  }}" class="list-group-item list-group-item-action">
                        反馈管理
                    </a>
                    <a href="{{ route('admin.dir.index')  }}" class="list-group-item list-group-item-action">
                        文件目录管理
                    </a>
                    <a href="{{ route('admin.file.index')  }}" class="list-group-item list-group-item-action">
                        文件管理
                    </a>
                    <a href="{{ route('admin.asset.index')  }}" class="list-group-item list-group-item-action">
                        大文件上传
                    </a>
                </div>
            </div>
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $('#a-box a').each(function () {
        if (location.href.includes($(this).attr('href'))) {
            $(this).addClass('active');
        }
    });
</script>
@yield('js')
</body>
</html>
