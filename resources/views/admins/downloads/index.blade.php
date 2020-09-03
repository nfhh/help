@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">下载管理</h2>
            <a class="btn btn-primary" href="{{ route('admin.download.create') }}">添加</a>
        </div>
        <div class="card-body">
            @include('common._message')
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">产品</th>
                    <th scope="col">类型</th>
                    <th scope="col">名称</th>
                    <th scope="col">版本</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tr>
                    <?php
                    foreach ($downloads as $download) {
                    echo "<tr><td>{$download->product->name}</td><td>{$download->menu['zh-cn']}</td>";
                    $body = json_decode($download->body);
                    foreach ($body as $v) {
                        if ($v->lan == 'zh-cn') {
                            echo "<td>{$v->name}</td><td>{$v->version}</td>";
                            continue;
                        }
                    }?>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-secondary"
                               href="{{ route('admin.download.edit',$download->id) }}">编辑</a>
                            <a href="javascript:;" onclick="del({{ $download->id }})" class="btn btn-danger">删除</a>
                        </div>
                    </td>
                </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function del(id) {
            if (confirm(`确定删除id为 ${id} 的记录吗？`)) {
                var url = '{{ route("admin.download.destroy", ":id") }}';
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
