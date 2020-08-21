@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">编辑TOS帮助文章</h2>
        </div>
        <div class="card-body">
            @include('admins.layouts._g')
            <arte route="{{ route('admin.article.update',$article->id) }}"
                  :categories="{{ json_encode($categories) }}"
                  :templates="{{ $templates }}"
                  :article="{{ $article }}"></arte>
        </div>
    </div>
@endsection
