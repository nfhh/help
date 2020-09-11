@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">添加单文章</h2>
        </div>
        <div class="card-body">
            @include('admins.layouts._g')
            <remark route="{{ route('admin.remark.store') }}"
                 :templates="{{ json_encode($templates) }}"></remark>
        </div>
    </div>
@endsection
