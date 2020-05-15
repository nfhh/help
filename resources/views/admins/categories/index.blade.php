@extends('admins.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('admin.product.create') }}" class="btn btn-primary mb-3">添加</a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">分类名</th>
                                <th scope="col">排序</th>
                                <th scope="col">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a class="btn btn-secondary"
                                               href="{{ route('admin.category.edit',$product->id) }}">编辑</a>
                                            <a href="javascript:alert('屏蔽危险操作，请使用编辑！')" class="btn btn-danger">删除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
