@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">编辑安装指南文章</h2>
        </div>
        <div class="card-body">
            @include('admins.layouts._g')
            <stepe route="{{ route('admin.step.update',$step->id) }}"
                   :products="{{ $products }}"
                   :templates="{{ $templates }}"
                   :step="{{ $step }}"></stepe>
        </div>
    </div>
@endsection
