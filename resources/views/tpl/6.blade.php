<?php
$str = '<ul>';
foreach ($vars as $var) {
    if ($var[0] === '$' && $var[strlen($var) - 1] === '$') {
        preg_match('/\$(.*)\$/', $var, $matches1);
        foreach (explode('|', $matches1[1]) as $img) {
            if ($img[strlen($img) - 1] === ']') {
                $pattern = '/\[(.*)\]/';
                preg_match($pattern, $img, $matches2);
                $href = $matches2[1];
                $img = preg_replace($pattern, '', $img);
                $str .= '<a target="_blank" href="' . $href . '"><img class="img-fluid" src="' . $img . '"/></a>';
            } else {
                $str .= '<img src="' . $img . '" class="img-fluid">';
            }
        }
        continue;
    }
    preg_match('/\((.*)\)/', $var, $matches);
    $mid = $matches[1];
    $str .= '<li><p>';
    if (strpos($var, '|') !== false) {
        foreach (explode('|', $mid) as $v) {
            $str .= $excel[$v][$lan];
        }
    } else {
        $str .= $excel[$mid][$lan];
    }
    $str .= '</p></li></ul>';
}
echo $str;
?>
