@extends('admins.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">编辑TOS帮助目录</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.category.update',$category->id) }}">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">所属目录</label>
                    <select class="form-control" name="parent_id" id="parent_id">
                        <option value="0">顶级目录</option>
                        @foreach($categories as $item)
                            <option value="{{ $item['id'] }}" {{$item['id'] == $category['parent_id'] ?"selected":""}}>{{$item['html']}}{{ $item['zh-cn'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="slug">slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $category['slug'] }}">
                </div>
                <div class="form-group">
                    <label for="name">目录名（英语）</label>
                    <input type="text" class="form-control" id="name" name="en-us" value="{{ $category['en-us'] }}">
                </div>
                <div class="form-group">
                    <label for="name">目录名（德语）</label>
                    <input type="text" class="form-control" id="name" name="de-de" value="{{ $category['de-de'] }}">
                </div>
                <div class="form-group">
                    <label for="name">目录名（法语）</label>
                    <input type="text" class="form-control" id="name" name="fr-fr" value="{{ $category['fr-fr'] }}">
                </div>
                <div class="form-group">
                    <label for="name">目录名（意大利语）</label>
                    <input type="text" class="form-control" id="name" name="it-it" value="{{ $category['it-it'] }}">
                </div>
                <div class="form-group">
                    <label for="name">目录名（西班牙语）</label>
                    <input type="text" class="form-control" id="name" name="es-es" value="{{ $category['es-es'] }}">
                </div>
                <div class="form-group">
                    <label for="name">目录名（匈牙利语）</label>
                    <input type="text" class="form-control" id="name" name="hu-hu" value="{{ $category['hu-hu'] }}">
                </div>                <div class="form-group">
                    <label for="name">目录名（俄语）</label>
                    <input type="text" class="form-control" id="name" name="ru-ru" value="{{ $category['ru-ru'] }}">
                </div>                <div class="form-group">
                    <label for="name">目录名（韩语）</label>
                    <input type="text" class="form-control" id="name" name="ko-kr" value="{{ $category['ko-kr'] }}">
                </div>
                <div class="form-group">
                    <label for="name">目录名（日语）</label>
                    <input type="text" class="form-control" id="name" name="ja-jp" value="{{ $category['ja-jp'] }}">
                </div>
                <div class="form-group">
                    <label for="name">目录名（中文）</label>
                    <input type="text" class="form-control" id="name" name="zh-cn" value="{{ $category['zh-cn'] }}">
                </div>
                <div class="form-group">
                    <label for="name">目录名（繁体中文）</label>
                    <input type="text" class="form-control" id="name" name="zh-hk" value="{{ $category['zh-hk'] }}">
                </div>
                <div class="form-group">
                    <label for="name">目录名（波兰语）</label>
                    <input type="text" class="form-control" id="name" name="pl-pl" value="{{ $category['pl-pl'] }}">
                </div>
                <div class="form-group">
                    <label for="name">目录名（土耳其语）</label>
                    <input type="text" class="form-control" id="name" name="tr-tr" value="{{ $category['tr-tr'] }}">
                </div>
                <div class="form-group">
                    <label for="sort">排序</label>
                    <input type="text" class="form-control" id="sort" name="sort" value="{{ $category->sort }}">
                </div>
                <button type="submit" class="btn btn-primary">确定</button>
            </form>
        </div>
    </div>
@endsection
