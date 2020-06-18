@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">编辑FAQ问答</h2>
        </div>
        <div class="card-body">
            @include('admins.layouts._g')
            <faqe route="{{ route('admin.faq.update',$faq->id) }}"
                   :subjects="{{ $subjects }}"
                   :templates="{{ $templates }}"
                   :faq="{{ $faq }}"></faqe>
        </div>
    </div>
@endsection
