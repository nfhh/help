<ul>
    @foreach($vars as $var)
        <li>{{ $excel[$var][$lan] }}</li>
    @endforeach
</ul>
