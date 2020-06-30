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
<div>
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
            @include('admins.layouts._left')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="h5 mb-0">下载中心文件上传</h2>
                    </div>
                    <div class="card-body">
                        <div id="containerx">
                            <button class="btn btn-secondary" id="selectfiles">选择文件</button>
                            <button class="btn btn-primary" @click="selectFile">开始上传</button>
                            <hr>
                            <ul>
                                <li v-for="file in files">上传进度@{{file.percent}}%</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/vue/2.5.9/vue.min.js"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script type="text/javascript" src="/lib/base64.js"></script>
<script type="text/javascript" src="/lib/crypto1/crypto/crypto.js"></script>
<script type="text/javascript" src="/lib/crypto1/hmac/hmac.js"></script>
<script type="text/javascript" src="/lib/crypto1/sha1/sha1.js"></script>
<script type="text/javascript" src="/lib/plupload-2.1.2/js/plupload.full.min.js"></script>
<script>
    new Vue({
        el: '#containerx',
        data() {
            return {
                accessid: "{{ config('filesystems.disks.oss.access_id') }}",
                accesskey: "{{ config('filesystems.disks.oss.access_key') }}",
                host: "{{ config('filesystems.disks.oss.oss_url') }}",
                policyText: {
                    "expiration": "2099-01-01T12:00:00.000Z",
                    "conditions": [
                        ["content-length-range", 0, 1048576000]
                    ]
                },
                signature: '',
                files: [],
                uploader: {}
            }
        },
        mounted() {
            const self = this;
            var uploader = new plupload.Uploader({
                runtimes: 'html5,flash,silverlight,html4',
                browse_button: 'selectfiles',
                multi_selection: false,
                container: document.getElementById('containerx'),
                flash_swf_url: '/lib/plupload-2.1.2/js/Moxie.swf',
                silverlight_xap_url: '/lib/plupload-2.1.2/js/Moxie.xap',
                url: 'http://oss.aliyuncs.com',

                init: {
                    PostInit: function () {
                    },

                    FilesAdded: function (up, files) {
                        self.files = files;
                    },

                    BeforeUpload: function (up, file) {
                        self.set_upload_param(up, file.name, true);
                        // 上传前
                    },

                    UploadProgress: function (up, file) {
                        // 可以在此设置上传进度
                    },

                    FileUploaded: function (up, file, info) {
                        if (info.status == 200) {
                            axios.post("{{ route('admin.asset.store') }}", {
                                'url': file.name,
                                'size': file.size
                            }).then(response => {

                            })
                            location.href = "{{ route('admin.asset.index') }}"
                        }
                    },

                    Error: function (up, err) {
                        // 上传错误
                    }
                }
            });
            self.uploader = uploader;
            self.uploader.init();
        },
        methods: {
            selectFile() {
                this.set_upload_param(this.uploader, '', false);
            },
            set_upload_param(up, filename, ret) {
                var policyBase64 = Base64.encode(JSON.stringify(this.policyText));
                var message = policyBase64;
                var bytes = Crypto.HMAC(Crypto.SHA1, message, this.accesskey, {
                    asBytes: true
                });
                var signature = Crypto.util.bytesToBase64(bytes);
                var new_multipart_params = {
                    'Filename': 'abc/' + filename,
                    'key': filename,
                    'policy': policyBase64,
                    'OSSAccessKeyId': this.accessid,
                    'success_action_status': '200',
                    'signature': signature,
                };

                up.setOption({
                    'url': this.host,
                    'multipart_params': new_multipart_params
                });

                up.start();
            }
        }
    })

    $('#a-box a').each(function () {
        if (location.href.includes($(this).attr('href'))) {
            $(this).addClass('active');
        }
    });
</script>
</body>
</html>
