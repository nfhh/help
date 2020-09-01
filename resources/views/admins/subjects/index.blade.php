@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">FAQ分类管理</h2>
            <div class="btn-group" role="group">
                <a class="btn btn-primary" href="{{ route('admin.subject.create') }}">添加</a>
                <a class="btn btn-danger" href="javascript:;"
                   onclick="if(confirm(`确定清空数据吗？`)){
                               event.preventDefault(); document.getElementById('truncate-form').submit();
                           }">
                    清空数据
                </a>
            </div>
            <form id="truncate-form" action="{{ route('admin.faq.truncate') }}" method="POST"
                  style="display: none;">
                @csrf
                @method('delete')
            </form>
        </div>
        <div class="card-body">
            @include('common._message')
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">目录名</th>
                    <th scope="col">排序</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subjects['data'] as $subject)
                    @if(!(empty($subject['children'])))
                        <tr>
                            <td>{{ $subject['zh-cn'] }}</td>
                            <td>{{ $subject['sort'] }}</td>
                        </tr>
                        @foreach($subject['children'] as $child)
                            <tr>
                                <td>-- {{ $child['zh-cn'] }}</td>
                                <td>{{ $child['sort'] }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>{{ $subject['zh-cn'] }}</td>
                            <td>{{ $subject['sort'] }}</td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
