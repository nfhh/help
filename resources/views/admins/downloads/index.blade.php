@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">下载管理</h2>
            <a class="btn btn-primary" href="{{ route('admin.download.create') }}">添加</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">产品</th>
                    <th scope="col">类型</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($downloads['data'] as $download)
                    <tr>
                        <td>{{ $download['product']['name'] }}</td>
                        <td>{{ $download['menu']['zh-cn'] }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-secondary"
                                   href="{{ route('admin.download.edit',$download['id']) }}">编辑</a>
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
