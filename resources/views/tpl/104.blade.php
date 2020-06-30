<?php
$str = '';
foreach ($vars as $k => $var) {
    if ($var[0] === '{' && $var[strlen($var) - 1] === '}') {
        preg_match('/{(.*)}/', $var, $matches1);
        $str .= '<p>';
        foreach (explode('|', $matches1[1]) as $v) {
            if ($v[0] === '*' || $v[strlen($v) - 1] === '*') {
                $v = str_replace('*', '', $v);
                $str .= '<b>' . $excel[$v][$lan] . '</b>';
            } elseif ($v[strlen($v) - 1] === ']') {
                $pattern = '/\[(.*)\]/';
                preg_match($pattern, $v, $matches2);
                $href = $matches2[1];
                $text = preg_replace($pattern, '', $v);
                $str .= '<a href="' . $href . '">' . $excel[$text][$lan] . '</a>';
            } else {
                $str .= $excel[$v][$lan];
            }
        }
        $str .= '</p>';
    } else {
        $str .= '<p>';
        foreach (explode('|', $var) as $v) {
            if ($v[0] === '*' || $v[strlen($v) - 1] === '*') {
                $v = str_replace('*', '', $v);
                $str .= '<b>' . $excel[$v][$lan] . '</b>';
            } elseif ($v[strlen($v) - 1] === ']') {
                $pattern = '/\[(.*)\]/';
                preg_match($pattern, $v, $matches2);
                $href = $matches2[1];
                $text = preg_replace($pattern, '', $v);
                $str .= '<a href="' . $href . '">' . $excel[$text][$lan] . '</a>';
            } else {
                $str .= $excel[$v][$lan];
            }
        }
        $str .= '</p>';
    }
}
echo $str;
?>

