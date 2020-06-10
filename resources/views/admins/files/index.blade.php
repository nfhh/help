@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">文件管理</h2>
            <a class="btn btn-primary" href="{{ route('admin.file.create') }}">添加</a>
        </div>
        <div class="card-body">
            <form class="form-inline">
                <select class="custom-select my-1 mr-sm-2 w-25" name="dir_id" id="dir_id" required>
                    @foreach($dirs as $dir)
                        @if(!($dir->children->isEmpty()))
                            <option value="{{ $dir->id }}">{{ $dir->name }}</option>
                            @foreach($dir->children as $child)
                                <option value="{{ $child->id }}">--{{ $child->name }}</option>
                            @endforeach
                        @else
                            <option value="{{ $dir->id }}"
                                    @if(isset($query['dir_id']) && $query['dir_id'] == $dir->id) selected @endif>
                                {{ $dir->name }}
                            </option>
                        @endif
                    @endforeach
                </select>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="submit" class="btn btn-primary">查询</button>
                    <a href="{{ route('admin.file.index') }}" class="btn btn-secondary">重置</a>
                </div>
            </form>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">目录</th>
                    <th scope="col">文件</th>
                    <th scope="col">上传日期</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($files as $file)
                    <tr>
                        <td>{{ $file->dir->name }}</td>
                        <td>
                            <p><img src="{{ env('OSS_URL') }}{{ $file->path }}" class="img-fluid"></p>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="{{ env('OSS_URL') }}{{ $file->path }}">
                                <div class="input-group-append">
                                    <a href="javascript:;" class="input-group-text"
                                       onclick="copyToClipboard(this)">复制</a>
                                </div>
                            </div>
                        </td>
                        <td>{{ $file->created_at }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-secondary"
                                   href="javascript:;">编辑</a>
                                <a href="javascript:alert('屏蔽危险操作，请使用编辑！')" class="btn btn-danger">删除</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function copyToClipboard(obj) {
            $(obj).parent().prev().select();
            document.execCommand('copy');
        }
    </script>
@endsection
