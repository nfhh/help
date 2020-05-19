@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">添加文件目录</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.dir.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">所属目录</label>
                    <select class="form-control" name="parent_id" id="parent_id">
                        <option value="0">顶级目录</option>
                        @foreach($dirs as $dir)
                            @if(!($dir->children->isEmpty()))
                                <option value="{{ $dir->id }}">{{ $dir->name }}</option>
                                @foreach($dir->children as $child)
                                    <option value="{{ $child->id }}" disabled>--{{ $child->name }}</option>
                                @endforeach
                            @else
                                <option value="{{ $dir->id }}">{{ $dir->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">目录名</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <button type="submit" class="btn btn-primary">确定</button>
            </form>
        </div>
    </div>
@endsection
