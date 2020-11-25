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
                $str .= '<a target="_blank" href="'.$href.'"><img class="img-fluid" src="'.$img.'"/></a>';
            } else {
                $str .= '<img src="'.$img.'" class="img-fluid">';
            }
        }
        continue;
    }
    preg_match('/\((.*)\)/', $var, $matches);
    $mid = $matches[1];
    $str .= '<li><p>';
    if (strpos($var, '|') !== false) {
        foreach (explode('|', $mid) as $v) {
            if ($v[strlen($v) - 1] === ']') {
                $pattern = '/\[(.*)\]/';
                preg_match($pattern, $v, $matches3);
                $href2 = $matches3[1];
                $v = preg_replace($pattern, '', $v);
                $str .= '<a target="_blank" href="'.$href2.'">'.$excel[$v][$lan].'</a>';
            } else {
                $str .= $excel[$v][$lan];
            }
        }
    } else {
        if ($mid[strlen($mid) - 1] === ']') {
            $pattern = '/\[(.*)\]/';
            preg_match($pattern, $mid, $matches3);
            $href2 = $matches3[1];
            $locale = app()->getLocale();
            $href2_arr = explode(';', $href2);
            $href2_c = count($href2_arr);
            if ($href2_c === 2) {
                list($cn, $en) = $href2_arr;
                $href2 = $locale === 'zh-cn' ? $cn : $en;
            } elseif ($href2_c === 3) {
                list($cn, $en, $ja) = $href2_arr;
                if ($locale === 'zh-cn') {
                    $href2 = $cn;
                } elseif ($locale === 'ja-jp') {
                    $href2 = $ja;
                } else {
                    $href2 = $en;
                }
            } elseif ($href2_c === 1) {
                $href2 = $href2_arr[0];
            }

            $mid = preg_replace($pattern, '', $mid);
            $str .= '<a target="_blank" href="'.$href2.'">'.$excel[$mid][$lan].'</a>';
        } else {
            $str .= $excel[$mid][$lan];
        }
    }
    $str .= '</p></li>';
}
$str .= '</ul>';
echo $str;
?>
