@extends('admins.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">OSS文件目录</div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            @foreach($dirs as $dir)
                                <a target="_blank" href="{{ route('admin.alioss.index') }}?dir={{$dir}}"
                                   class="list-group-item list-group-item-action">{{ $dir }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

