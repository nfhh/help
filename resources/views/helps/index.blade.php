@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.th_h')
        @include('partials.th_tab')
        <div class="row pt-3">
            <div class="col-md-3">
                <div class="bg-white" id="a-box">
                    <div class="accordion" id="accordionExample">
                        @foreach($categories as $k=>$category)
                            <div class="card border-0">
                                @if(!(empty($category['children'])))
                                    <div class="card-header p-1 bg-white mb-0 border-bottom-1" id="heading{{$k}}">
                                        <h5 class="mb-0">
                                            <button
                                                class="btn btn-link btn-block text-left text-dark text-decoration-none shadow-none pl-0"
                                                type="button" data-toggle="collapse"
                                                data-target="#collapse{{$k}}">
                                                {{ $category[$lan] }}
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse{{$k}}" class="collapse @if($k==0) show @endif"
                                         data-parent="#accordionExample">
                                        <div class="list-group list-group-flush my-tab">
                                            @foreach($category['children'] as $child)
                                                <a href="/toshelp?category_id={{$child['id']}}"
                                                   class="list-group-item list-group-item-action px-4 text-dark">
                                                    {{ $child[$lan] }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <div class="card-header" id="heading{{$k}}">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#collapseOne">
                                                {{ $category[$lan] }}
                                            </button>
                                        </h5>
                                    </div>
                                @endif
                            </div>
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
                        @include('tpl.'.$arr['template_id'], ['vars' => explode(',',$arr['variables']),'excel' => $excel,'lan' => $lan])
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
