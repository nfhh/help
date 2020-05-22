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
                <nav class="nav nav-tabs">
                    <a href="/faq?subject_id=1" class="nav-item nav-link active">TNAS 常见问题</a>
                    <a href="/faq?subject_id=2" class="nav-item nav-link">DAS 常见问题</a>
                    <a href="#" class="nav-item nav-link">TOS 帮助</a>
                </nav>
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-md-3">
                <div class="bg-white">
                    <div class="list-group list-group-flush" id="a-box">
                        @foreach($subjects as $subject)
                            <a href="/faq?subject_id={{$subject->id}}"
                               class="list-group-item list-group-item-action">{{ $subject->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="bg-white p-3">
                    <h1>
                        @php
                            $excel = json_decode($faq->excel, true);
                            echo $excel[$faq->title][$lan];
                        @endphp
                    </h1>
                    @php
                        $body_arr = json_decode($faq->body, true);
                    @endphp
                    @foreach($body_arr as $arr)
                        @include('tpl.'.$arr['template_id'], ['vars' => explode(',',$arr['variables']),'excel' => $excel,'lan' => $lan])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
