@extends('layouts.white')
@section('content')
    <div class="container" x-data>
        @foreach(array_chunk($files,3) as $k=>$row)
            <div class="row">
                @foreach($row as $kk=>$v)
                    <div class="col-md-4">
                        <div>
                            <img src="{{ config('filesystems.disks.oss.oss_url') }}{{ $v }}" class="img-fluid">
                        </div>
                        <div class="input-group mb-3">
                            <input x-ref="oss{{ $k.$kk }}" type="text" class="form-control"
                                   value="{{ config('filesystems.disks.oss.oss_url') }}{{ $v }}" readonly>
                            <div class="input-group-append">
                                <a href="javascript:;" class="btn btn-primary"
                                   x-on:click="$refs.oss{{ $k.$kk }}.select();document.execCommand('copy')">复制</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
@section('js')
    <script src="/js/alpine.min.js"></script>
@endsection
