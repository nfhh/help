@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.th_h')
        @if($parent_id)
            @include('partials.th_tab',['parent_id'=>$parent_id])
        @else
            @include('partials.th_tab')
        @endif
        @php
            foreach($fenlei as &$item){
                $item['text'] = $item[$lan];
                $item['href'] = '/faq?subject_id='.$item['id'];
            }
        @endphp
        <div class="row pt-3">
            @include('common._tree')
            <div class="col-md-9">
                <div class="bg-white p-3">
                    <h1 class="h3 pb-3">
                        @php
                            $excel = json_decode($faq->excel, true);
                            echo $excel[$faq->title][$lan];
                            $body_arr = json_decode($faq->body, true);
                        @endphp
                    </h1>
                    @foreach($body_arr as $arr)
                        @php
                            if($arr['template_id'] == 2 || $arr['template_id'] == 12 || $arr['template_id'] == 3 || $arr['template_id'] == 4 || $arr['template_id'] == 5 || $arr['template_id'] == 6){
                                $delimiter = PHP_EOL;
                            }else{
                                $delimiter = '|';
                            }
                        @endphp
                        @include('tpl.'.$arr['template_id'], ['vars' => explode($delimiter,$arr['variables']),'excel' => $excel,'lan' => $lan])
                    @endforeach
                    <feedback
                        text1="{{ trans('help.feedback_res') }}"
                        text2="{{ trans('help.ask') }}"
                        text3="{{ trans('help.yes') }}"
                        text4="{{ trans('help.no') }}"
                        text5="{{ trans('help.ask_p1') }}"
                        text6="{{ trans('help.ask_ch1') }}"
                        text7="{{ trans('help.ask_ch2') }}"
                        text8="{{ trans('help.ask_ch3') }}"
                        text9="{{ trans('help.ask_ch4') }}"
                        text10="{{ trans('help.ask_p2') }}"
                        text11="{{ trans('help.submit') }}"
                        text12="{{ trans('help.cancel') }}"
                    ></feedback>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('common._tree-js')
