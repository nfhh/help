<h2 class="h4 font-weight-bolder text-dark pt-3 pb-2 text-center">
    @foreach($vars as $k=>$var)
        {{ $excel[$var][$lan] }}
    @endforeach
</h2>
<hr class="my-hr mb-4">
