@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.th_h')
        <div class="row">
            <div class="col-md-12">
                <div class="bg-white">
                    @if($results->isEmpty())
                        <div class="alert alert-danger">
                            {{trans('help.empty_res')}}
                        </div>
                    @else
                        <div class="list-group list-group-flush">
                            <ul class="list-group list-group-flush px-4">
                                @foreach($results as $result)
                                    <li class="list-group-item py-4 px-0 article">
                                        @if($tb==='articles')
                                            @php
                                                $excel = json_decode($result->excel, true);
                                            @endphp
                                        @else
                                            <h5>
                                                <a href="/faq/{{ $result->id }}?subject_id={{$result->subject_id}}"
                                                   class="text-dark">
                                                    @php
                                                        $excel = json_decode($result->excel, true);
                                                        echo $excel[$result->title][$lan]
                                                    @endphp
                                                </a>
                                            </h5>
                                        @endif
                                        <p class="mb-0">
                                            <a href="@if($tb==='articles') /toshelp?category_id={{$result->category_id}} @else  /faq/{{ $result->id }}?subject_id={{$result->subject_id}} @endif"
                                               class="text-secondary">
                                                @php
                                                    $body = json_decode($result->body, true);
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
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
