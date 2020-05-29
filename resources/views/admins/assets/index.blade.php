@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">大文件上传</h2>
            <a class="btn btn-primary" href="{{ route('admin.asset.create') }}">上传</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">文件url</th>
                    <th scope="col">大小（字节）</th>
                </tr>
                </thead>
                <tbody>
                @foreach($assets as $asset)
                    <tr>
                        <td>{{ env('OSS_URL').$asset->url }}</td>
                        <td>{{ $asset->size }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $assets->links() }}
        </div>
    </div>
@endsection
