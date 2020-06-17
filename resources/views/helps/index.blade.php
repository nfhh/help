@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.th_h')
        @include('partials.th_tab')
        <div class="row pt-3">
            <div class="col-md-3">
                <div class="bg-white" id="a-box">
                    <div class="list-group list-group-flush my-tab">
                        @foreach($categories as $item)
                            @if(!(empty($item['grandchildren'])))
                                <a href="/toshelp?category_id={{$item['id']}}"
                                   class="list-group-item list-group-item-action px-4 text-dark">
                                    {{ $item[$lan] }}
                                </a>
                                @foreach($item['grandchildren'] as $child)
                                    <a href="/toshelp?category_id={{$child['id']}}"
                                       class="list-group-item list-group-item-action px-4 text-dark">
                                        {!! str_repeat('&nbsp',2) !!}{{ $child[$lan] }}
                                    </a>
                                    @if(!(empty($child['grandchildren'])))
                                        @foreach($child['grandchildren'] as $childx)
                                            <a href="/toshelp?category_id={{$childx['id']}}"
                                               class="list-group-item list-group-item-action px-4 text-dark">
                                                {!! str_repeat('&nbsp',4) !!}{{ $childx[$lan] }}
                                            </a>
                                        @endforeach
                                    @endif
                                @endforeach
                            @else
                                <option value="{{ $item['id'] }}">{{ $item['zh-cn'] }}</option>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="bg-white p-3">
                    @php
                        $excel = json_decode($article->excel, true);
                        $body_arr = json_decode($article->body, true);
                    @endphp
                    @foreach($body_arr as $arr)
                        @include('tpl.'.$arr['template_id'], ['vars' => explode('|',$arr['variables']),'excel' => $excel,'lan' => $lan])
                    @endforeach
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
@endsection
