@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">编辑FAQ分类</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.subject.update',$subject->id) }}">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">所属分类</label>
                    <select class="form-control" name="parent_id" id="parent_id">
                        <option value="0">顶级分类</option>
                        @foreach($subjects as $item)
                            @if(!(empty($item['children'])))
                                <option value="{{ $item['id'] }}"
                                        @if($item['id'] == $subject->parent_id) selected @endif>{{ $item['zh-cn'] }}</option>
                                @foreach($item['children'] as $child)
                                    <option value="{{ $child['id'] }}" disabled>--{{ $child['zh-cn'] }}</option>
                                @endforeach
                            @else
                                <option value="{{ $item['id'] }}"
                                        @if($item['id'] == $subject->parent_id) selected @endif>{{ $item['zh-cn'] }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">分类名（英语）</label>
                    <input type="text" class="form-control" id="name" name="en-us" value="{{ $subject['en-us'] }}" required>
                </div>
                <div class="form-group">
                    <label for="name">分类名（德语）</label>
                    <input type="text" class="form-control" id="name" name="de-de" value="{{ $subject['de-de'] }}" required>
                </div>
                <div class="form-group">
                    <label for="name">分类名（法语）</label>
                    <input type="text" class="form-control" id="name" name="fr-fr" value="{{ $subject['fr-fr'] }}" required>
                </div>
                <div class="form-group">
                    <label for="name">分类名（意大利语）</label>
                    <input type="text" class="form-control" id="name" name="it-it" value="{{ $subject['it-it'] }}" required>
                </div>
                <div class="form-group">
                    <label for="name">分类名（西班牙语）</label>
                    <input type="text" class="form-control" id="name" name="es-es" value="{{ $subject['es-es'] }}" required>
                </div>
                <div class="form-group">
                    <label for="name">分类名（匈牙利语）</label>
                    <input type="text" class="form-control" id="name" name="hu-hu" value="{{ $subject['hu-hu'] }}" required>
                </div>                <div class="form-group">
                    <label for="name">分类名（俄语）</label>
                    <input type="text" class="form-control" id="name" name="ru-ru" value="{{ $subject['ru-ru'] }}" required>
                </div>                <div class="form-group">
                    <label for="name">分类名（韩语）</label>
                    <input type="text" class="form-control" id="name" name="ko-kr" value="{{ $subject['ko-kr'] }}" required>
                </div>
                <div class="form-group">
                    <label for="name">分类名（日语）</label>
                    <input type="text" class="form-control" id="name" name="ja-jp" value="{{ $subject['ja-jp'] }}" required>
                </div>
                <div class="form-group">
                    <label for="name">分类名（中文）</label>
                    <input type="text" class="form-control" id="name" name="zh-cn" value="{{ $subject['zh-cn'] }}" required>
                </div>
                <div class="form-group">
                    <label for="name">分类名（繁体中文）</label>
                    <input type="text" class="form-control" id="name" name="zh-hk" value="{{ $subject['zh-hk'] }}" required>
                </div>
                <div class="form-group">
                    <label for="name">分类名（波兰语）</label>
                    <input type="text" class="form-control" id="name" name="pl-pl" value="{{ $subject['pl-pl'] }}" required>
                </div>
                <div class="form-group">
                    <label for="name">分类名（土耳其语）</label>
                    <input type="text" class="form-control" id="name" name="tr-tr" value="{{ $subject['tr-tr'] }}" required>
                </div>
                <div class="form-group">
                    <label for="sort">排序</label>
                    <input type="text" class="form-control" id="sort" name="sort" value="{{ $subject->sort }}" required>
                </div>
                <button type="submit" class="btn btn-primary">确定</button>
            </form>
        </div>
    </div>
@endsection
