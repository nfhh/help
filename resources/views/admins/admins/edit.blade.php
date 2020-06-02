@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">修改密码</h2>
        </div>
        <div class="card-body">
            @include('admins.layouts._message')
            <form action="{{ route('admin.admin.update') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="password">密码</label>
                    <input type="text" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">确定</button>
            </form>
        </div>
    </div>
@endsection
