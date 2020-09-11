@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">TOS帮助文章管理</h2>
            <a class="btn btn-primary" href="{{ route('admin.remark.create') }}">添加</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">slug</th>
                    <th scope="col">页面标题</th>
                    <th scope="col">创建时间</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($remarks as $remark)
                    <tr>
                        <td>{{ '/posts/'.$remark->var }}</td>
                        <td>{{ $remark[$lan] }}</td>
                        <td>{{ $remark->created_at }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-secondary"
                                   href="{{ route('admin.remark.edit',$remark->id) }}">编辑</a>
                                <a href="javascript:alert('屏蔽危险操作，请使用编辑！')" class="btn btn-danger">删除</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $remarks->links() }}
    </div>
@endsection
