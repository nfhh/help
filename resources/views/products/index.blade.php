@extends('layouts.white')
@section('css')
    <style>
        @media (min-width: 1281px) {
            .page-item {
                width: 200px !important;
                padding-left: 10px;
                text-align: center;
            }
            .pagination li:last-child a,.pagination li:last-child a:hover{
                background-color:#3A90DC;
                color: #fff;
                border: 1px solid #3A90DC;
            }
        }

        @media (min-width: 1025px) and (max-width: 1280px) {
            .page-item {
                width: 200px !important;
                padding-left: 10px;
                text-align: center;
            }
            .pagination li:last-child a,.pagination li:last-child a:hover{
                background-color:#3A90DC;
                color: #fff;
                border: 1px solid #3A90DC;
            }
        }

        .page-item {
            width: 100%;
            padding-left: 10px;
            text-align: center;
        }

        .pagination li:last-child a,.pagination li:last-child a:hover{
            background-color:#3A90DC;
            color: #fff;
            border: 1px solid #3A90DC;
        }
    </style>
 @endsection
@section('content')
    <div class="container">
        <nav>
            <ol class="breadcrumb bg-transparent">
                <li class="breadcrumb-item"><a href="/quickguide" class="text-dark">{{ trans('help.back') }}</a></li>
                <li class="breadcrumb-item active">{{ $product->name }}</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="row align-items-center py-2">
            <div class="col-md-8 bg-white mx-auto">
                @foreach ($steps as $step)
                    <div class="py-3 px-4">
                        @php
                            $body_arr = json_decode($step->body, true);
                            array_multisort(array_column($body_arr, 'sort'), SORT_ASC, $body_arr);
                        @endphp
                        {{-- 107 说明灰块 111 无边框表格 110 有边框表格 105 数字列表 106 方块列表--}}
                        @foreach($body_arr as $arr)
                            @php
                                if($arr['template_id'] == 107 || $arr['template_id'] == 111 || $arr['template_id'] == 110 || $arr['template_id'] == 105 || $arr['template_id'] == 106){
                                    $delimiter = PHP_EOL;
                                }else{
                                    $delimiter = '|';
                                }
                            @endphp
                            @include('tpl.'.$arr['template_id'], ['vars' => explode($delimiter,$arr['variables']),'excel' => $excel,'lan' => $lan])
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container">
        {{ $steps->withQueryString()->links() }}
    </div>
@endsection
