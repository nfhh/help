<?php
$str = '<p class="text-center">';
$var = $vars[0];
if ($var[strlen($var) - 1] === ']') {
    $pattern = '/\[(.*)\]/';
    preg_match($pattern, $var, $matches1);
    $href = $matches1[1];
    if (strpos($href, ';') !== false) {
        list($cn, $en) = explode(';', $href);
        $href = \Illuminate\Support\Facades\App::getLocale() === 'zh-cn' ? $cn : $en;
    }
    $img = preg_replace($pattern, '', $var);
    $str .= '<a target="_blank" href="' . $href . '"><img class="img-fluid" src="' . $img . '"/></a>';
} else {
    $str .= '<img class="img-fluid" src="' . $var . '"/>';
}
$str .= '</p>';
echo $str;
?>

