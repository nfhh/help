@extends('layouts.app')

@section('content')
    <div class="container">
        {{--
                @include('partials.guide_h')
                <product product_id="{{ $product_id }}"
                         start="{{ trans('help.start') }}"
                         product_tip1="{{ trans('help.product_tip1') }}"
                         product_tip2="{{ trans('help.product_tip2') }}"
                         product_tip3="{{ trans('help.product_tip3') }}"></product>--}}
        <nav>
            <ol class="breadcrumb bg-transparent">
                <li class="breadcrumb-item"><a href="/quickguide" class="text-dark">{{ trans('help.back') }}</a></li>
                <li class="breadcrumb-item active">{{ $product->name }}</li>
            </ol>
        </nav>
        <div class="row py-2">
            <div class="col-md-12 bg-white">
                @php
                    $excel = json_decode($product->excel, true);
                @endphp
                @foreach ($steps as $step)
                    <div class="py-3 px-4">
                        @php
                            $body_arr = json_decode($step->body, true);
                        @endphp
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
                @endforeach
                <div class="py-3 px-4">
                    {{ $steps->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
