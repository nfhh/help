@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">安装指南文章管理</h2>
            <a class="btn btn-primary" href="{{ route('admin.step.create') }}">添加</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">产品型号</th>
                        <th scope="col">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($steps as $step)
                        <tr>
                            <td>{{ $step->product->name }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a class="btn btn-secondary"
                                       href="{{ route('admin.step.edit',$step->id) }}">编辑</a>
                                    <a href="javascript:alert('屏蔽危险操作，请使用编辑！')" class="btn btn-danger">删除</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
