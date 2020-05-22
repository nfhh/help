<div class="alert alert-secondary">
    <h2 class="h6"><strong>{{ trans('help.note') }}</strong></h2>
    @foreach($vars as $k=>$var)
        {{ $excel[$var][$lan] }}
        @if($k === count($vars) - 1){{ $lan === 'zh-cn' ? '。' : '.' }}@else{{ $lan === 'zh-cn' ? '，' : ',' }}@endif
    @endforeach
</div>
