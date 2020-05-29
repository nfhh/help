@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">添加下载</h2>
        </div>
        <div class="card-body">
            <download route="{{ route('admin.download.store') }}"
                      :products="{{ $products }}"
                      :menus="{{ json_encode($menus) }}"
                      :lans="{{ json_encode($lans) }}"
            ></download>
        </div>
    </div>
@endsection
