@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">添加TOS帮助文章</h2>
        </div>
        <div class="card-body">
            @include('admins.layouts._g')
            <art route="{{ route('admin.article.store') }}"
                 :categories="{{ json_encode($categories) }}"
                 :templates="{{ $templates }}"></art>
        </div>
    </div>
@endsection
