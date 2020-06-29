@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">添加下载</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.download.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="product_id">所属产品</label>
                    <select name="product_id" id="product_id" class="form-control">
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="menu_id">类型</label>
                    <select name="menu_id" id="menu_id" class="form-control">
                        @foreach($menus as $menu)
                            <option value="{{ $menu['id'] }}">{{ $menu['zh-cn'] }}</option>
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
