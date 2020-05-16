@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <arte route="{{ route('admin.article.update',$article->id) }}"
                  :categories="{{ $categories }}"
                  :templates="{{ $templates }}"
                  :article="{{ $article }}"></arte>
        </div>
    </div>
@endsection
