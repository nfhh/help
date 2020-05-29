@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.download_h')
        <product tourl="/download/packages"
                 start="{{ trans('help.start') }}"
                 product_tip1="{{ trans('help.product_tip1') }}"
                 product_tip2="{{ trans('help.product_tip2') }}"
                 product_tip3="{{ trans('help.product_tip3') }}"></product>
    </div>
@endsection
