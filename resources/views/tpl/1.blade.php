<p>
    @foreach($vars as $k=>$var)
        {{ $excel[$var][$lan] }}
        @if($k === count($vars) - 1){{ $lan === 'zh-cn' ? '。' : '.' }}@else{{ $lan === 'zh-cn' ? '，' : ',' }}@endif
    @endforeach
</p>
