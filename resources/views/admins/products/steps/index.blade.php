@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">安装指南管理</h2>
            <a class="btn btn-primary"
               href="{{ route('admin.product.steps.create') }}?redirect_url={{ Request::path() }}">添加</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">序号</th>
                    <th scope="col">产品型号</th>
                    <th scope="col">标题</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($steps as $step)
                    <tr>
                        <td>{{ $step->id }}</td>
                        <td>{{ $step->sort }}</td>
                        <td>{{ $step->product->name }}</td>
                        <td>{{ $step->title }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-secondary"
                                   href="{{ route('admin.product.steps.edit',$step->id) }}?redirect_url={{ Request::path() }}">编辑</a>
                                <a href="javascript:;" onclick="del('{{ $step->id }}')" class="btn btn-danger">删除</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function del(id) {
            if (confirm(`确定删除 id 为 ${id} 的记录吗？`)) {
                axios.post("{{ route('admin.product.steps.destroy') }}", {
                    'id': id,
                }).then(response => {
                    location.reload()
                })
            }
        }
    </script>
@endsection
