@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-md-6">
                <h1 class="display-5">帮助文档</h1>
                <p class="text-muted">请输入搜索关键字然后点击“搜索”，。如果您的问题没有解答，请与我们联系。</p>
                <div class="input-group">
                    <input type="text" class="form-control" id="user" placeholder="">
                    <div class="input-group-append">
                        <a href="#" class="input-group-text bg-transparent"><i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <nav class="nav nav-tabs" id="n-box">
                    <a href="/faq?subject_id=1" class="nav-item nav-link">TNAS 常见问题</a>
                    <a href="/faq?subject_id=2" class="nav-item nav-link">DAS 常见问题</a>
                    <a href="#" class="nav-item nav-link active">TOS 帮助</a>
                </nav>
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-md-3">
                <div class="bg-white" id="a-box">
                    <div class="accordion" id="accordionExample">
                        @foreach($categories as $k=>$category)
                            <div class="card">
                                @if(!(empty($category['children'])))
                                    <div class="card-header p-1" id="heading{{$k}}">
                                        <h5 class="mb-0">
                                            <button
                                                class="btn btn-link btn-block text-left text-decoration-none shadow-none"
                                                type="button" data-toggle="collapse"
                                                data-target="#collapse{{$k}}">
                                                {{ $category[$lan] }}
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse{{$k}}" class="collapse @if($k==0) show @endif"
                                         data-parent="#accordionExample">
                                        <div class="list-group list-group-flush">
                                            @foreach($category['children'] as $child)
                                                <a href="/toshelp?category_id={{$child['id']}}"
                                                   class="list-group-item list-group-item-action p-2">
                                                    {{ $child[$lan] }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <div class="card-header" id="heading{{$k}}">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#collapseOne">
                                                {{ $category[$lan] }}
                                            </button>
                                        </h5>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="bg-white p-3">
                    @php
                        $excel = json_decode($article->excel, true);
                        $body_arr = json_decode($article->body, true);
                    @endphp
                    @foreach($body_arr as $arr)
                        @include('tpl.'.$arr['template_id'], ['vars' => explode(',',$arr['variables']),'excel' => $excel,'lan' => $lan])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
