@extends('layouts.app')

@section('content')
    <div class="container">
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
                            $body_arr = json_decode($faq->body, true);
                        @endphp
                    </h1>
                    @foreach($body_arr as $arr)
                        @php
                            if($arr['template_id'] == 2 || $arr['template_id'] == 12 || $arr['template_id'] == 3 || $arr['template_id'] == 4 || $arr['template_id'] == 5){
                                $delimiter = PHP_EOL;
                            }else{
                                $delimiter = '|';
                            }
                        @endphp
                        @include('tpl.'.$arr['template_id'], ['vars' => explode($delimiter,$arr['variables']),'excel' => $excel,'lan' => $lan])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
