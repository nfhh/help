@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">编辑安装指南型号</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.product.update',$product->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">产品</label>
                    <input type="text" class="form-control" id="name" name="name" required value="{{ $product->name }}">
                </div>
                <div class="form-group">
                    <label for="sort">排序</label>
                    <input type="text" class="form-control" id="sort" name="sort" required value="{{ $product->sort }}">
                </div>
                <button type="submit" class="btn btn-primary">确定</button>
            </form>
        </div>
    </div>
@endsection
