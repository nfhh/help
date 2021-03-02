@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">FAQ问答管理</h2>
            <a class="btn btn-primary" href="{{ route('admin.faq.create') }}">添加</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">faq分类</th>
                        <th scope="col">标题</th>
                        <th scope="col">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($faqs as $faq)
                        <tr>
                            <td>
                                @php
                                    $var = $faq->subject['var']
                                @endphp
                                【{{ substr($var,0,strpos($var,'-')) ?: substr($var,0,strpos($var,'_'))}}】
                                {{ $faq->subject['zh-cn'] }}
                            </td>
                            <td>{{ $faq->title }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a class="btn btn-secondary"
                                       href="{{ route('admin.faq.edit',$faq->id) }}">编辑</a>
                                    <a href="javascript:;" onclick="del({{ $faq->id }})" class="btn btn-danger">删除</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $faqs->links() }}
            </div>
        </div>
    </div>
    <script>
        function del(id) {
            if (confirm(`确定删除id为 ${id} 的记录吗？`)) {
                var url = '{{ route("admin.faq.destroy", ":id") }}';
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
