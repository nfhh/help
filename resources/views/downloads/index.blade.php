@extends('layouts.app')

@section('content')
    <div class="container">
        <nav>
            <ol class="breadcrumb bg-transparent pl-0">
                <li class="breadcrumb-item"><a href="/download" class="text-dark">{{ trans('help.back') }}</a></li>
                <li class="breadcrumb-item active">{{ $product->name }}</li>
            </ol>
        </nav>
        <h1 class="h2 pb-2">下载中心</h1>
        <div class="row py-2">
            <div class="col-md-12 bg-white">
                <ul class="nav nav-pills border-bottom-1 my-tab mb-3">
                    @foreach($downloads as $key=>$download)
                        <li class="nav-item">
                            <a class="nav-link text-dark @if($key==0) active @endif" data-toggle="pill"
                               href="#z{{$key}}">{{ $download['menu'][$lan] }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach($downloads as $key=>$download)
                        <div class="tab-pane fade @if($key==0) show active @endif" id="z{{$key}}">
                            <table class="table">
                                <thead>
                                <tr class="table-active">
                                    <td>{{ trans('help.name') }}</td>
                                    <td>{{ trans('help.description') }}</td>
                                    <td>{{ trans('help.version') }}</td>
                                    <td>{{ trans('help.action') }}</td>
                                    <td>{{ trans('help.size') }}</td>
                                    <td>{{ trans('help.remark') }}</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($download['body'] as $vv)
                                    @php
                                        $arr = json_decode($vv, true);
                                        $nd = [];
                                        foreach ($arr as $v){
                                            if($v['lan']==$lan){
                                                $nd = $v;
                                                break;
                                            }
                                        }
                                    @endphp
                                    <tr>
                                        <td>{{ $nd['name'] }}</td>
                                        <td>{{ $nd['description'] }}</td>
                                        <td>{{ $nd['version'] }}</td>
                                        <td><a href="{{ $nd['url'] }}">{{ trans('help.download') }}</a></td>
                                        <td>{{ formatBytes($nd['size']) }}</td>
                                        <td><a href="{{ $nd['remark'] }}" target="_blank">{{ trans('help.view') }}</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
