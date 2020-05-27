@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.th_h')
        @if($parent_id)
            @include('partials.th_tab',['parent_id'=>$parent_id])
        @else
            @include('partials.th_tab')
        @endif
        <div class="row pt-3">
            <div class="col-md-3">
                <div class="bg-white">
                    @include('partials.left',['subjects'=>$subjects])
                </div>
            </div>
            <div class="col-md-9">
                <div class="bg-white p-3">
                    <h1 class="h3 text-center my-2">
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
