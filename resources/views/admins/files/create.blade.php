@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">添加文件</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.file.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="dir_id">所属目录</label>
                    <select class="form-control" name="dir_id" id="dir_id" required>
                        @foreach($dirs as $dir)
                            @if(!($dir->children->isEmpty()))
                                <option value="{{ $dir->id }}">{{ $dir->name }}</option>
                                @foreach($dir->children as $child)
                                    <option value="{{ $child->id }}">--{{ $child->name }}</option>
                                @endforeach
                            @else
                                <option value="{{ $dir->id }}">{{ $dir->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="file">上传</label>
                    <input type="file" class="form-control-file" id="file" name="file" required>
                </div>
                <button type="submit" class="btn btn-primary">确定</button>
            </form>
        </div>
    </div>
@endsection
