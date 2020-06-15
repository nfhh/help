@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">变量替换</h2>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="var">变量</label>
                <textarea class="form-control" id="var" rows="20" name="var"></textarea>
            </div>
            <button type="button" onclick="rep()" class="btn btn-primary">确定</button>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function rep() {
            axios.post("{{ route('admin.var.handle') }}", {
                'var': $('#var').val(),
            }).then(response => {
                $('#var').val(response.data.data)
            })
        }
    </script>
@endsection
