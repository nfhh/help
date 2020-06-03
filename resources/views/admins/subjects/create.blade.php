@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">添加FAQ分类</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.subject.store') }}">
                @csrf
                <div class="form-group">
                    <label for="parent_id">所属分类</label>
                    <select class="form-control" name="parent_id" id="parent_id">
                        <option value="0">顶级分类</option>
                        @foreach($subjects as $subject)
                            @if(!(empty($subject['children'])))
                                <option value="{{ $subject['id'] }}">{{ $subject['zh-cn'] }}</option>
                                @foreach($subject['children'] as $child)
                                    <option value="{{ $child['id'] }}" disabled>--{{ $child['zh-cn'] }}</option>
                                @endforeach
                            @else
                                <option value="{{ $subject['id'] }}">{{ $subject['zh-cn'] }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="slug">slug</label>
                    <input type="text" class="form-control" id="slug" name="slug">
                </div>
                <div class="form-group">
                    <label for="en-us">分类名（英语）</label>
                    <input type="text" class="form-control" id="en-us" name="en-us">
                </div>
                <div class="form-group">
                    <label for="de-de">分类名（德语）</label>
                    <input type="text" class="form-control" id="de-de" name="de-de">
                </div>
                <div class="form-group">
                    <label for="fr-fr">分类名（法语）</label>
                    <input type="text" class="form-control" id="fr-fr" name="fr-fr">
                </div>
                <div class="form-group">
                    <label for="it-it">分类名（意大利语）</label>
                    <input type="text" class="form-control" id="it-it" name="it-it">
                </div>
                <div class="form-group">
                    <label for="es-es">分类名（西班牙语）</label>
                    <input type="text" class="form-control" id="es-es" name="es-es">
                </div>
                <div class="form-group">
                    <label for="hu-hu">分类名（匈牙利语）</label>
                    <input type="text" class="form-control" id="hu-hu" name="hu-hu">
                </div>                <div class="form-group">
                    <label for="ru-ru">分类名（俄语）</label>
                    <input type="text" class="form-control" id="ru-ru" name="ru-ru">
                </div>                <div class="form-group">
                    <label for="ko-kr">分类名（韩语）</label>
                    <input type="text" class="form-control" id="ko-kr" name="ko-kr">
                </div>
                <div class="form-group">
                    <label for="ja-jp">分类名（日语）</label>
                    <input type="text" class="form-control" id="ja-jp" name="ja-jp">
                </div>
                <div class="form-group">
                    <label for="zh-cn">分类名（中文）</label>
                    <input type="text" class="form-control" id="zh-cn" name="zh-cn">
                </div>
                <div class="form-group">
                    <label for="zh-hk">分类名（繁体中文）</label>
                    <input type="text" class="form-control" id="zh-hk" name="zh-hk">
                </div>
                <div class="form-group">
                    <label for="pl-pl">分类名（波兰语）</label>
                    <input type="text" class="form-control" id="pl-pl" name="pl-pl">
                </div>
                <div class="form-group">
                    <label for="tr-tr">分类名（土耳其语）</label>
                    <input type="text" class="form-control" id="tr-tr" name="tr-tr">
                </div>
                <div class="form-group">
                    <label for="sort">排序</label>
                    <input type="text" class="form-control" id="sort" name="sort">
                </div>
                <button type="submit" class="btn btn-primary">确定</button>
            </form>
        </div>
    </div>
@endsection
