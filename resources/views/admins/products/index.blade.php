@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">安装指南型号管理</h2>
            <a class="btn btn-primary" href="{{ route('admin.product.create') }}">添加</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">产品型号</th>
                    <th scope="col">盘位</th>
                    <th scope="col">类型</th>
                    <th scope="col">排序</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td><a href="{{ route('admin.product.steps',$product->id) }}">{{ $product->name }}</a></td>
                        <td>{{ $product->size }}</td>
                        <td>{{ $product->type }}</td>
                        <td>{{ $product->sort }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-secondary"
                                   href="{{ route('admin.product.edit',$product->id) }}">编辑</a>
                                <a href="javascript:alert('屏蔽危险操作，请使用编辑！')" class="btn btn-danger">删除</a>
                                <button type="button" data-toggle="modal" data-target="#cpModal"
                                        data-whatever="{{ $product->id }}"
                                        class="btn btn-warning">复制
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="cpModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cpModalLabel">复制所有文章</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.product.steps.copy') }}">
                        @csrf
                        <input type="hidden" class="form-control" name="old_product_id" id="old_product_id">
                        <div class="form-group">
                            <label for="product_id" class="col-form-label">复制到:</label>
                            <select class="form-control" name="product_id" id="product_id">
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">确定</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#cpModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var recipient = button.data('whatever')

            var modal = $(this)
            modal.find('.modal-body #old_product_id').val(recipient)
            modal.find(`.modal-body option`).prop('disabled', false)
            modal.find(`.modal-body option[value="${recipient}"]`).prop('disabled', true)
            modal.find(`.modal-body option:not([disabled]):first`).prop('selected', true)
        })
    </script>
@endsection
