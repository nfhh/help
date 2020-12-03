@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">快速安装指南用户邮箱</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.email.export') }}" method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="start_date">开始日期</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $start_date }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="end_date">结束日期</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $end_date }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary">确定</button>
                    </div>
                </div>
            </form>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">用户邮箱</th>
                    <th scope="col">产品类别</th>
                    <th scope="col">盘位数量</th>
                    <th scope="col">ID/型号</th>
                    <th scope="col">添加时间</th>
                </tr>
                </thead>
                <tbody>
                @foreach($emails as $email)
                    <tr>
                        <td>{{ $email->email }}</td>
                        <td>{{ $email->cplb }}</td>
                        <td>{{ $email->pwsl }}</td>
                        <td>{{ $email->idxh }}</td>
                        <td>{{ $email->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $emails->links() }}
        </div>
    </div>
@endsection
@section('js')
    <script>
        function update(obj, id) {
            axios.post("{{ route('admin.feedback.update') }}", {
                'id': id,
                'status': $(obj).val(),
            }).then(res => {
                location.reload()
            })
        }
    </script>
@endsection
