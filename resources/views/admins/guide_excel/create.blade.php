@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">上传安装指南翻译表</h2>
        </div>
        <div class="card-body">
            @include('admins.layouts._message')
            <form method="POST" action="{{ route('admin.guide_excel.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="file">上传</label>
                    <input type="file" class="form-control-file" id="file" name="file" required>
                </div>
                <button type="submit" class="btn btn-primary">确定</button>
            </form>
        </div>
    </div>
@endsection
