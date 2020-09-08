@foreach($body_arr as $arr)
    @php
        if($arr['template_id'] == 2 || $arr['template_id'] == 12 || $arr['template_id'] == 3 || $arr['template_id'] == 4 || $arr['template_id'] == 5  || $arr['template_id'] == 6 || $arr['template_id'] == 7){
            $delimiter = PHP_EOL;
        }else{
            $delimiter = '|';
        }
    @endphp
    @include('tpl.'.$arr['template_id'], ['vars' => explode($delimiter,$arr['variables']),'excel' => $excel,'lan' => $lan])
@endforeach
