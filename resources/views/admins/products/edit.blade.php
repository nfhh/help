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
                    <label for="size">盘位</label>
                    <select class="form-control" id="size" name="size">
                        @foreach([2, 4, 5, 8, 12, 16, 24] as $v)
                            <option value="{{$v}}" @if($v==$product->size) selected @endif>{{$v}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="type">类型</label>
                    <select class="form-control" id="type" name="type">
                        @foreach(['TNAS','TDAS'] as $v)
                            <option value="{{$v}}" @if($v==$product->type) selected @endif>{{$v}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="file">上传Excel</label>
                    <input type="file" class="form-control-file" id="file" name="file"
                           accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
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
