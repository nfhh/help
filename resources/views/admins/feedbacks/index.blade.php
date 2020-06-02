@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">反馈管理</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">url</th>
                    <th scope="col">原因</th>
                    <th scope="col">留言
                    <th>
                    <th scope="col">状态
                    <th>
                </tr>
                </thead>
                <tbody>
                @foreach($feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedback->url }}</td>
                        <td>
                            @php
                                $str = '';
                                $arr = explode(',',$feedback->reasons);
                                foreach ($arr as $v){
                                    $str =  $str ? $str.'<br>'.trans('help.' . 'ask_ch'.$v) : trans('help.' . 'ask_ch'.$v);
                                }
                                echo $str;
                            @endphp
                        </td>
                        <td>{{ $feedback->body }}</td>
                        <td>
                            <select class="form-control" onchange="update(this,{{ $feedback->id }})">
                                <option value="1" @if($feedback->status == '待处理') selected @endif>待处理</option>
                                <option value="2" @if($feedback->status == '已处理') selected @endif>已处理</option>
                                <option value="3" @if($feedback->status == '作废') selected @endif>作废</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $feedbacks->links() }}
        </div>
    </div>
@endsection
@section('js')
    <script>
        function update(obj, id) {
            axios.post("{{ route('admin.feedback.update') }}", {
                'id': id,
                'status': $(obj).val(),
            }).then(res => {
                location.reload()
            })
        }
    </script>
@endsection
