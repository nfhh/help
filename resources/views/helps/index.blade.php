@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="/css/bstreeview.min.css">
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
                $categories = replaceKey($categories,$lan);
        @endphp
        <livewire:help-left :categories="$categories"/>
    </div>
@endsection

