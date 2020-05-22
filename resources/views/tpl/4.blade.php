<ol>
    @foreach($vars as $var)
        <li>{{ $excel[$var][$lan] }}</li>
    @endforeach
</ol>
