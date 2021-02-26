@extends('layouts.app')
@section('title')
    @php
        echo request()->get('kw','');
    @endphp
@endsection
@section('content')
    <div class="container">
        @include('partials.th_h')
        <div class="row">
            <div class="col-md-12">
                <div class="bg-white">
                    <div class="list-group list-group-flush">
                        <ul class="list-group list-group-flush px-4">
                            @foreach($results as $faq)
                                <li class="list-group-item py-4 px-0 article">
                                    <h5>
                                        <a href="/faqs/{{ $faq->subject->var }}/{{ $faq->title }}"
                                           class="my-title">
                                            @php
                                                $excel = json_decode($faq->excel, true);
                                                echo $excel[$faq->title][$lan]
                                            @endphp
                                        </a>
                                    </h5>
                                    <p class="mb-0">
                                        <a href="/faqs/{{ $faq->subject->var }}/{{ $faq->title }}"
                                           class="text-secondary">
                                            @php
                                                $body = json_decode($faq->body, true);
                                                $arr = explode(',', $body[0]['variables']);
                                                foreach ($arr as $k => $v) {
                                                    if (strpos($v, '|') !== false) {
                                                        foreach (explode('|', $v) as $kk=> $vv) {
                                                            echo $excel[$vv][$lan];
                                                        }
                                                    }else{
                                                        echo $excel[$v][$lan];
                                                        if ($k === count($arr) - 1) {
                                                            echo '...';
                                                        } else {
                                                            echo $lan === 'zh-cn' ? '，' : ',';
                                                        }
                                                    }
                                                }
                                            @endphp
                                        </a>
                                    </p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    {{ $results->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
