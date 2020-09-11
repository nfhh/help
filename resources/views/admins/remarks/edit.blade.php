@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">编辑TOS帮助文章</h2>
        </div>
        <div class="card-body">
            @include('admins.layouts._g')
            <remarke route="{{ route('admin.remark.update',$remark->id) }}"
                    :templates="{{ json_encode($templates) }}"
                    :remark="{{ json_encode($remark) }}"
            ></remarke>
        </div>
    </div>
@endsection
