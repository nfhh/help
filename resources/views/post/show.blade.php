@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-12">
                <h1 class="display-5">{{ $remark[$lan] }}</h1>
                <div class="bg-white p-3">
                    @php
                        $excel = json_decode($remark->excel, true);
                        $body_arr = json_decode($remark->body, true);
                    @endphp
                    @include('layouts.split_var')
                </div>
            </div>
        </div>
    </div>
@endsection
