@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">添加FAQ分类</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.subject.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="parent_id">所属分类</label>
                    <select class="form-control" name="parent_id" id="parent_id">
                        <option value="0">顶级分类</option>
                        @foreach($subjects as $subject)
                            @if(!(empty($subject['children'])))
                                <option value="{{ $subject['id'] }}">{{ $subject['zh-cn'] }}</option>
                                @foreach($subject['children'] as $child)
                                    <option value="{{ $child['id'] }}" disabled>--{{ $child['zh-cn'] }}</option>
                                @endforeach
                            @else
                                <option value="{{ $subject['id'] }}">{{ $subject['zh-cn'] }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="file">上传FAQ分类翻译表</label>
                    <input type="file" class="form-control-file" id="file" name="file">
                </div>
                <button type="submit" class="btn btn-primary">确定</button>
            </form>
        </div>
    </div>
@endsection
