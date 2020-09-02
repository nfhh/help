@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">FAQ分类管理</h2>
            <a class="btn btn-primary" href="{{ route('admin.subject.create') }}">添加</a>
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
                @foreach($subjects as $subject)
                    @if(!($subject->children->isEmpty()))
                        <tr>
                            <td>{{ $subject['zh-cn'] }}</td>
                            <td>{{ $subject->sort }}</td>
                        </tr>
                        @foreach($subject->children as $child)
                            <tr>
                                <td>-- {{ $child['zh-cn'] }}</td>
                                <td>{{ $child->sort }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>{{ $subject['zh-cn'] }}</td>
                            <td>{{ $subject->sort }}</td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            {{ $subjects->links() }}
        </div>
    </div>
@endsection
