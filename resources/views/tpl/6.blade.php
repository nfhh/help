<?php
$str = '<p>';
if ($vars[strlen($vars) - 1] === ')') {
    $pattern = '/\((.*)\)/';
    preg_match($pattern, $vars, $matches1);
    $href = $matches1[1];
    $img = preg_replace($pattern, '', $vars);
    $str .= '<a href="' . $href . '"><img class="img-fluid" src="' . $img . '/></a>';
} else {
    $str .= '<img class="img-fluid" src="' . $vars[0] . '"/>';
}
$str .= '</p>';
echo $str;
?>
