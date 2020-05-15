@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.article.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">所属分类</label>
                    <select class="form-control" name="parent_id" id="parent_id">
                        <option value="0">顶级分类</option>
                        @foreach($categories as $category)
                            @if($category->children)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @foreach($category->children as $child)
                                    <option value="{{ $child->id }}" disabled>--{{ $child->name }}</option>
                                @endforeach
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">上传</label>
                    <input type="file" class="form-control-file" id="file" name="file"
                           accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                </div>
                <div class="form-group">
                    <label for="variable">设置变量</label>
                    <textarea class="form-control" id="variable" rows="10" name="variable"></textarea>
                </div>
                <div class="form-group">
                    <label for="template">作用样式</label>

                </div>
                <div class="form-group">
                    <label for="sort">排序</label>
                    <input type="text" class="form-control" id="sort" name="sort">
                </div>
                <button type="submit" class="btn btn-primary">确定</button>
            </form>
        </div>
    </div>
@endsection
