<ul>
    @foreach($vars as $var)
        <li style="text-indent: 2em;">{{ $excel[$var][$lan] }}</li>
    @endforeach
</ul>
