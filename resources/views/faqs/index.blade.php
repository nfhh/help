@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-md-6">
                <h1 class="display-5">{{ trans('help.help_doc') }}</h1>
                <p class="text-muted">{{ trans('help.search_tip') }}</p>
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
                    <a href="/faq?subject_id=1" class="nav-item nav-link @if($parent_id === 1) active @endif">TNAS
                        {{ trans('help.common_problem') }}</a>
                    <a href="/faq?subject_id=2" class="nav-item nav-link @if($parent_id === 2) active @endif">DAS {{ trans('help.common_problem') }}</a>
                    <a href="#" class="nav-item nav-link">TOS {{ trans('help.help') }}</a>
                </nav>
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-md-3">
                <div class="bg-white">
                    <div class="list-group list-group-flush" id="a-box">
                        @foreach($subjects as $subject)
                            <a href="/faq?subject_id={{$subject['id']}}"
                               class="list-group-item list-group-item-action">{{ $subject[$lan] }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="bg-white">
                    <div class="list-group list-group-flush">
                        <ul class="list-group list-group-flush px-4">
                            @foreach($faqs as $faq)
                                <li class="list-group-item py-4 px-0 article">
                                    <h5>
                                        <a href="/faq/{{ $faq->id }}?subject_id={{$faq->subject_id}}"
                                           class="text-dark">
                                            @php
                                                $excel = json_decode($faq->excel, true);
                                                echo $excel[$faq->title][$lan]
                                            @endphp
                                        </a>
                                    </h5>
                                    <p class="mb-0">
                                        <a href="/faq/{{ $faq->id }}?subject_id={{ $faq->subject_id }}"
                                           class="text-secondary">
                                            @php
                                                $body = json_decode($faq->body, true);
                                                $arr = explode(',', $body[0]['variables']);
                                                foreach ($arr as $k => $v) {
                                                    echo $excel[$v][$lan];
                                                    if ($k === count($arr) - 1) {
                                                        echo '...';
                                                    } else {
                                                        echo $lan === 'zh-cn' ? '，' : ',';
                                                    }
                                                }
                                            @endphp
                                        </a>
                                    </p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#n-box a').each(function () {
            if ($(this).attr('href').includes(location.search)) {
                $(this).addClass('active');
            }
        });
    </script>
@endsection
