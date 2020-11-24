@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">下载中心用户邮箱</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">用户邮箱</th>
                    <th scope="col">产品类别</th>
                    <th scope="col">盘位数量</th>
                    <th scope="col">ID/型号</th>
                </tr>
                </thead>
                <tbody>
                @foreach($emails as $email)
                    <tr>
                        <td>{{ $email->email }}</td>
                        <td>{{ $email->cplb }}</td>
                        <td>{{ $email->pwsl }}</td>
                        <td>{{ $email->idxh }}</td>
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
