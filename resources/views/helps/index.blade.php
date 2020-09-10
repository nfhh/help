@extends('layouts.app2')

@include('common._tree-css')
@section('content')
    <div class="container">
        @include('partials.th_h')
        @include('partials.th_tab')
        @php
            function replaceKey($data,$lan)
            {
                $arr1 = [];
                foreach ($data as $key => $val) {
                    if (is_array($val)) {
                        if(empty($val)){
                            continue;
                        }
                        $val = replaceKey($val,$lan);
                    }
                    if ($key === $lan) {
                        $arr1['text'] = $val;
                        $arr1['href'] = '/toshelp/'.$data['var'];
                    } else {
                        $arr1[$key] = $val;
                    }
                }
                return $arr1;
            }
                $fenlei = replaceKey($fenlei,$lan);
        @endphp
        <div class="row pt-3">
            @include('common._tree')
            <div class="col-md-9">
                <div class="bg-white">
                    <div class="list-group list-group-flush">
                        <ul class="list-group list-group-flush px-4">
                            @foreach($articles as $article)
                                <li class="list-group-item py-4 px-0 article">
                                    <h5>
                                        <a href="{{ '/toshelp/'.$article->category->var }}"
                                           class="my-title">
                                            @php
                                                $excel = json_decode($article->excel, true);
                                                echo $article->category[$lan]
                                            @endphp
                                        </a>
                                    </h5>
                                    <p class="mb-0">
                                        <a href="/toshelp/{{ $article->title }}"
                                           class="text-secondary">
                                            @php
                                                $body = json_decode($article->body, true);
                                                $arr = explode(',', $body[0]['variables']);
                                                foreach ($arr as $k => $v) {
                                                    if (strpos($v, '|') !== false) {
                                                        foreach (explode('|', $v) as $kk=> $vv) {
                                                            echo $excel[$vv][$lan];
                                                        }
                                                    }else{
                                                        echo $excel[$v][$lan];
                                                        if ($k === count($arr) - 1) {
                                                            echo '...';
                                                        } else {
                                                            echo $lan === 'zh-cn' ? '，' : ',';
                                                        }
                                                    }
                                                }
                                            @endphp
                                        </a>
                                    </p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@include('common._tree-js')

