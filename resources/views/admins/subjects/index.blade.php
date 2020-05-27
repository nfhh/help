@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">FAQ分类管理</h2>
            <a class="btn btn-primary" href="{{ route('admin.subject.create') }}">添加</a>
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
                @foreach($subjects['data'] as $subject)
                    @if(!(empty($subject['children'])))
                        <tr>
                            <td>{{ $subject['zh-cn'] }}</td>
                            <td>{{ $subject['sort'] }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-secondary"
                                       href="{{ route('admin.subject.edit',$subject['id']) }}">编辑</a>
                                    <a href="javascript:alert('屏蔽危险操作，请使用编辑！')" class="btn btn-danger">删除</a>
                                </div>
                            </td>
                        </tr>
                        @foreach($subject['children'] as $child)
                            <tr>
                                <td>-- {{ $child['zh-cn'] }}</td>
                                <td>{{ $child['sort'] }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-secondary"
                                           href="{{ route('admin.subject.edit',$child['id']) }}">编辑</a>
                                        <a href="javascript:alert('屏蔽危险操作，请使用编辑！')" class="btn btn-danger">删除</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>{{ $subject['zh-cn'] }}</td>
                            <td>{{ $subject['sort'] }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-secondary"
                                       href="{{ route('admin.subject.edit',$subject['id']) }}">编辑</a>
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
