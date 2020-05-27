@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.guide_h')
        <product start="{{ trans('help.start') }}"
                 product_tip1="{{ trans('help.product_tip1') }}"
                 product_tip2="{{ trans('help.product_tip2') }}"
                 product_tip3="{{ trans('help.product_tip3') }}"></product>
    </div>
@endsection
