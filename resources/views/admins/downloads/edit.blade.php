@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">编辑下载</h2>
        </div>
        <div class="card-body">
            <downloade route="{{ route('admin.download.update',$download->id) }}"
                       :products="{{ $products }}"
                       :menus="{{ json_encode($menus) }}"
                       :lans="{{ json_encode($lans) }}"
                       :download="{{ $download }}"
            ></downloade>
        </div>
    </div>
@endsection
