@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">添加FAQ问答</h2>
        </div>
        <div class="card-body">
            @include('admins.layouts._g')
            <faq route="{{ route('admin.faq.store') }}"
                 :subjects="{{ $subjects }}"
                 :templates="{{ $templates }}"></faq>
        </div>
    </div>
@endsection
