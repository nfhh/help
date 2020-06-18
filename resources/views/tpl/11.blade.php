<h2 class="h5 font-weight-bolder text-dark pb-3 pt-2">
    @foreach($vars as $k=>$var)
        {{ $excel[$var][$lan] }}
    @endforeach
</h2>
