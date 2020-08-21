@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">TOS帮助目录管理</h2>
            <a class="btn btn-primary" href="{{ route('admin.category.create') }}">添加</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">目录名</th>
                    <th scope="col">排序</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $item)
                    <tr>
                        <td>{{$item['html']}}{{ $item['zh-cn'] }}</td>
                        <td>{{ $item['sort'] }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-secondary"
                                   href="{{ route('admin.category.edit',$item['id']) }}">编辑</a>
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
