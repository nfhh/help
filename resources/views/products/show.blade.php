@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.guide_hx')
        <productx tourl="/quickguide/steps"
                 start="{{ trans('help.start') }}"
                 selected_type_id="{{ trans('help.tnas') }}"
                 product_tip1="{{ trans('help.product_tip1') }}"
                 product_tip2="{{ trans('help.product_tip2') }}"
                 product_tip3="{{ trans('help.product_tip3') }}"></productx>
    </div>
@endsection
