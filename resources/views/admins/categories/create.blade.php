@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">添加TOS帮助目录</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">所属目录</label>
                    <select class="form-control" name="parent_id" id="parent_id">
                        <option value="0">顶级目录</option>
                        @foreach($categories as $item)
                            @if(!(empty($item['grandchildren'])))
                                <option value="{{ $item['id'] }}">{{ $item['zh-cn'] }}</option>
                                @foreach($item['grandchildren'] as $child)
                                    <option value="{{ $child['id'] }}">--{{ $child['zh-cn'] }}</option>
                                    @if(!(empty($child['grandchildren'])))
                                        @foreach($child['grandchildren'] as $childx)
                                            <option value="{{ $childx['id'] }}" disabled>----{{ $childx['zh-cn'] }}</option>
                                        @endforeach
                                    @endif
                                @endforeach
                            @else
                                <option value="{{ $item['id'] }}">{{ $item['zh-cn'] }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="file">目录</label>
                    <input type="file" class="form-control-file" id="file" name="file">
                </div>
                <button type="submit" class="btn btn-primary">确定</button>
            </form>
        </div>
    </div>
@endsection
