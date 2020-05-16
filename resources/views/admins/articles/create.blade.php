@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <art route="{{ route('admin.article.store') }}"
                 :categories="{{ $categories }}"
                 :templates="{{ $templates }}"></art>
        </div>
    </div>
@endsection
