@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row py-2">
            <div class="col-md-12 bg-white">
                <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                    @foreach($arr as $k => $title)
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#{{$k}}">{{$k}}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach($arr as $k => $list)
                        <div class="tab-pane fade show active" id="{{$k}}">
                            @foreach($list as $val)
                                <p>{{$val}}</p>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
