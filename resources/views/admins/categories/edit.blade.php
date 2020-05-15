@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.category.store') }}">
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
                    <label for="name">分类名</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <button type="submit" class="btn btn-primary">确定</button>
            </form>
        </div>
    </div>
@endsection
