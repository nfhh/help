<?php
$str = '<p class="text-center">';
$var = $vars[0];
if ($var[strlen($var) - 1] === ')') {
    $pattern = '/\((.*)\)/';
    preg_match($pattern, $var, $matches1);
    $href = $matches1[1];
    $img = preg_replace($pattern, '', $var);
    $str .= '<a href="' . $href . '"><img class="img-fluid" src="' . $img . '"/></a>';
} else {
    $str .= '<img class="img-fluid" src="' . $var . '"/>';
}
$str .= '</p>';
echo $str;
?>
