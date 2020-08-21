@extends('layouts.app')

@section('css')
    <link href="/css/bstreeview.css" rel="stylesheet">
@endsection
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
                        $arr1['href'] = '/toshelp?category_id='.$data['id'];
                    } else {
                        $arr1[$key] = $val;
                    }
                }
                return $arr1;
            }
                $fenlei = replaceKey($fenlei,$lan);
        @endphp
        <div class="container pt-3">
            <div class="row">
                <div class="col-md-3" id="tree">
                </div>
                <div class="col-md-9">
                    <div class="bg-white p-3 content">
                        @php
                            $excel = json_decode($article->excel, true);
                            $body_arr = json_decode($article->body, true);
                        @endphp

                        @include('layouts.split_var')
                        <feedback
                            text1="{{ trans('help.feedback_res') }}"
                            text2="{{ trans('help.ask') }}"
                            text3="{{ trans('help.yes') }}"
                            text4="{{ trans('help.no') }}"
                            text5="{{ trans('help.ask_p1') }}"
                            text6="{{ trans('help.ask_ch1') }}"
                            text7="{{ trans('help.ask_ch2') }}"
                            text8="{{ trans('help.ask_ch3') }}"
                            text9="{{ trans('help.ask_ch4') }}"
                            text10="{{ trans('help.ask_p2') }}"
                            text11="{{ trans('help.submit') }}"
                            text12="{{ trans('help.cancel') }}"
                        ></feedback>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="/js/bstreeview.js"></script>
    <script>
        var json = `<?php echo json_encode($fenlei, JSON_UNESCAPED_UNICODE);?>`;
        console.log(JSON.parse(json))
        $('#tree').bstreeview({
            data: JSON.parse(json),
            openNodeLinkOnNewTab: false
        });
    </script>
@endsection

