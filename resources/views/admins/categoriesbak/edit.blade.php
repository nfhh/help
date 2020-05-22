@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">编辑TOS帮助目录</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.category.update',$category->id) }}">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">所属分类</label>
                    <select class="form-control" name="parent_id" id="parent_id">
                        <option value="0">顶级分类</option>
                        @foreach($categories as $item)
                            @if(!($item->children->isEmpty()))
                                <option value="{{ $item->id }}"
                                        @if($item->id == $category->parent_id) selected @endif>{{ $item->name }}</option>
                                @foreach($item->children as $child)
                                    <option value="{{ $child->id }}" disabled>--{{ $child->name }}</option>
                                @endforeach
                            @else
                                <option value="{{ $item->id }}"
                                        @if($item->id == $category->parent_id) selected @endif>{{ $item->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">分类名</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
                </div>
                <div class="form-group">
                    <label for="sort">排序</label>
                    <input type="text" class="form-control" id="sort" name="sort" value="{{ $category->sort }}" required>
                </div>
                <button type="submit" class="btn btn-primary">确定</button>
            </form>
        </div>
    </div>
@endsection
