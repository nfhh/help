@extends('layouts.app')

@section('content')
    <div class="container">
        <nav>
            <ol class="breadcrumb bg-transparent pl-0">
                <li class="breadcrumb-item"><a href="/download" class="text-dark">{{ trans('help.back') }}</a></li>
                <li class="breadcrumb-item active">{{ $product->name }}</li>
            </ol>
        </nav>
        <h1 class="h2 pb-2">{{ trans('help.download_h') }}</h1>
        <div class="row py-2">
            <div class="col-md-12 bg-white">
                <ul class="nav nav-pills border-bottom-1 my-tab mb-3">
                    @foreach($res as $key=>$download)
                        <li class="nav-item">
                            <a class="nav-link text-dark @if($key==key($res)) active @endif" data-toggle="pill"
                               href="#z{{$key}}">{{ $menusx[$key][$lan] }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach($res as $key=>$download)
                        <div class="tab-pane fade @if($key==key($res)) show active @endif" id="z{{$key}}">
                            <table class="table">
                                <thead>
                                <tr class="table-active">
                                    <td>{{ trans('help.name') }}</td>
                                    <td>{{ trans('help.description') }}</td>
                                    <td>{{ trans('help.version') }}</td>
                                    <td>{{ trans('help.action') }}</td>
                                    <td>{{ trans('help.size') }}</td>
                                    <td>{{ trans('help.remark') }}</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($download as $vv)
                                    @php
                                        $arr = json_decode($vv['body'], true);
                                        $nd = [];
                                        foreach ($arr as $v){
                                            if($v['lan']==$lan){
                                                $nd = $v;
                                                break;
                                            }
                                        }
                                    @endphp
                                    <tr>
                                        <td>{{ $nd['name'] }}</td>
                                        <td>{{ $nd['description'] }}</td>
                                        <td>{{ $nd['version'] }}</td>
                                        <td>
                                            @if($key !=3 )
                                            <a href="{{ $nd['url'] }}">{{ trans('help.download') }}</a>
                                            @else
                                                {!! QrCode::size(120)->generate(config('app.url').'/download/app'); !!}
                                            @endif
                                        </td>
                                        <td>{{ formatBytes($nd['size']) }}</td>
                                        <td>
                                            <?php
                                            if($nd['remark']){
                                            $arrx = explode(';', $nd['remark']);
                                            if (count($arrx) > 1) {
                                            list($link, $md5) = $arrx;
                                            list($kk, $vv) = explode(':', $link);
                                            ?>
                                            <a href="<?php echo $vv; ?>"
                                               target="_blank"><?php echo $kk;?></a><br/>
                                            <?php echo $md5; ?>
                                            <?php } else {
                                            list($kk, $vv) = explode(':', $arrx[0]);
                                            if ($kk == 'MD5') { ?>
                                                <?php echo $arrx[0]; ?>
                                                <?php } else { ?>
                                            <a href="<?php echo $vv; ?>"
                                               target="_blank"><?php echo $kk;?></a>
                                            <?php }}}?>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
