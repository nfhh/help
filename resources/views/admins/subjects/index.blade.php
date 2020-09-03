@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">FAQ分类管理</h2>
            <a class="btn btn-primary" href="{{ route('admin.subject.create') }}">添加</a>
        </div>
        <div class="card-body">
            @include('common._message')
            <form action="{{ route('admin.subject.update') }}" method="post">
                @csrf
                @method('PUT')
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">目录名</th>
                            <th scope="col">slug</th>
                            <th scope="col">操作</th>
                            <th scope="col">排序</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subjects as $subject)
                            @if(!($subject->children->isEmpty()))
                                <tr>
                                    <td>{{ $subject['zh-cn'] }}</td>
                                    <td>{{ $subject->var }}</td>
                                    <td></td>
                                    <td>{{ $subject->sort }}</td>
                                </tr>
                                @foreach($subject->children as $child)
                                    <tr>
                                        <td>-- {{ $child['zh-cn'] }}</td>
                                        <td>{{ $child->var }}</td>
                                        <td><a href="javascript:;" onclick="del({{ $child->id }})"
                                               class="btn btn-danger">删除</a></td>
                                        <td><input type="number" class="form-control" name="sorts[{{ $child->id }}]"
                                                   value="{{ $child->sort }}"></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>{{ $subject['zh-cn'] }}</td>
                                    <td>{{ $subject->var }}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    <button class="btn btn-primary float-right" type="submit">排序</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function del(id) {
            if (confirm(`确定删除id为 ${id} 的记录吗？`)) {
                var url = '{{ route("admin.subject.destroy", ":id") }}';
                url = url.replace(':id', id);
                axios.delete(url).then(function (res) {
                    if (res.data.code === 0) {
                        alert(res.data.message);
                        location.reload();
                    } else {
                        alert(res.data.message);
                    }
                }).catch(function (err) {
                    console.log(err);
                })
            }
        }
    </script>
@endsection
