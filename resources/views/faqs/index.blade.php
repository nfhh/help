@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.th_h')
        @include('partials.th_tab')
        <div class="row pt-3">
            <div class="col-md-3">
                <div class="bg-white">
                    @include('partials.left',['subjects'=>$subjects])
                </div>
            </div>
            <div class="col-md-9">
                <div class="bg-white">
                    <div class="list-group list-group-flush">
                        <ul class="list-group list-group-flush px-4">
                            @foreach($faqs as $faq)
                                <li class="list-group-item py-4 px-0 article">
                                    <h5><a href="/faq/{{ $faq->id }}?subject_id={{$faq->subject_id}}"
                                           class="my-title">
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
