@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">添加安装指南文章</h2>
            <a class="btn btn-primary" href="javascript:;location.history(-1)">添加</a>
        </div>
        <div class="card-body">
            @include('admins.layouts._g')
            <step route="{{ route('admin.step.store') }}"
                 :products="{{ $products }}"
                 :templates="{{ $templates }}"></step>
        </div>
    </div>
@endsection
