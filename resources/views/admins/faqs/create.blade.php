@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">添加faq问答</h2>
        </div>
        <div class="card-body">
            <div class="alert alert-info" role="alert">
                变量之间用英文逗号<strong> , </strong>分隔
            </div>
            <faq route="{{ route('admin.faq.store') }}"
                 :subjects="{{ $subjects }}"
                 :templates="{{ $templates }}"></faq>
        </div>
    </div>
@endsection
