@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('admin.article.create') }}">添加</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">所属分类</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->category->name }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-secondary"
                                   href="{{ route('admin.article.edit',$article->id) }}">编辑</a>
                                <a href="javascript:alert('屏蔽危险操作，请使用编辑！')" class="btn btn-danger">删除</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
