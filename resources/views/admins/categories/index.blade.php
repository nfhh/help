@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('admin.category.create') }}">添加</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">分类名</th>
                    <th scope="col">排序</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    @if($category->children)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->sort }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-secondary"
                                       href="{{ route('admin.category.edit',$category->id) }}">编辑</a>
                                    <a href="javascript:alert('屏蔽危险操作，请使用编辑！')" class="btn btn-danger">删除</a>
                                </div>
                            </td>
                        </tr>
                        @foreach($category->children as $child)
                            <tr>
                                <td>-- {{ $child->name }}</td>
                                <td>{{ $child->sort }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-secondary"
                                           href="{{ route('admin.category.edit',$child->id) }}">编辑</a>
                                        <a href="javascript:alert('屏蔽危险操作，请使用编辑！')" class="btn btn-danger">删除</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->sort }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-secondary"
                                       href="{{ route('admin.category.edit',$category->id) }}">编辑</a>
                                    <a href="javascript:alert('屏蔽危险操作，请使用编辑！')" class="btn btn-danger">删除</a>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
