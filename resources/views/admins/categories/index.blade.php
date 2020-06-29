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
                @foreach($categories['data'] as $category)
                    @if(!(empty($category['grandchildren'])))
                        <tr>
                            <td>{{ $category['zh-cn'] }}</td>
                            <td>{{ $category['sort'] }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a class="btn btn-secondary"
                                       href="{{ route('admin.category.edit',$category['id']) }}">编辑</a>
                                    <a href="javascript:alert('屏蔽危险操作，请使用编辑！')" class="btn btn-danger">删除</a>
                                </div>
                            </td>
                        </tr>
                        @foreach($category['grandchildren'] as $child)
                            <tr>
                                <td>-- {{ $child['zh-cn'] }}</td>
                                <td>{{ $child['sort'] }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-secondary"
                                           href="{{ route('admin.category.edit',$child['id']) }}">编辑</a>
                                        <a href="javascript:alert('屏蔽危险操作，请使用编辑！')" class="btn btn-danger">删除</a>
                                    </div>
                                </td>
                            </tr>
                            @if(!(empty($child['grandchildren'])))
                                @foreach($child['grandchildren'] as $childx)
                                    <tr>
                                        <td>---- {{ $childx['zh-cn'] }}</td>
                                        <td>{{ $childx['sort'] }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-secondary"
                                                   href="{{ route('admin.category.edit',$childx['id']) }}">编辑</a>
                                                <a href="javascript:alert('屏蔽危险操作，请使用编辑！')" class="btn btn-danger">删除</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td>{{ $category['zh-cn'] }}</td>
                            <td>{{ $category['sort'] }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-secondary"
                                       href="{{ route('admin.category.edit',$category['id']) }}">编辑</a>
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
