<h2 class="h4 pb-3 font-weight-bolder text-dark text-center">
    @foreach($vars as $k=>$var)
        {{ $excel[$var][$lan] }}
    @endforeach
</h2>
