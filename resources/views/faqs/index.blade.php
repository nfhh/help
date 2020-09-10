@extends('layouts.app2')

@include('common._tree-css')
@section('content')
    <div class="container">
        @include('partials.th_h')
        @include('partials.th_tab')
        @php
            foreach($fenlei as &$item){
                $item['text'] = $item[$lan];
                $item['href'] = '/faqs/'.$item['var'];
            }
        @endphp
        <div class="row pt-3">
            @include('common._tree')
            <div class="col-md-9">
                <div class="bg-white">
                    <div class="list-group list-group-flush">
                        <ul class="list-group list-group-flush px-4">
                            @foreach($faqs as $faq)
                                <li class="list-group-item py-4 px-0 article">
                                    <h5>
                                        <a href="{{ '/faqs/'.$faq->subject->var .'/'. $faq->title }}"
                                           class="my-title">
                                            @php
                                                $excel = json_decode($faq->excel, true);
                                                echo $excel[$faq->title][$lan]
                                            @endphp
                                        </a>
                                    </h5>
                                    <p class="mb-0">
                                        <a href="/faqs/{{ $faq->title }}"
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
                    {{ $faqs->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@include('common._tree-js')
