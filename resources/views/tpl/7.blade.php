<div class="alert alert-secondary">
    <h2 class="h6"><strong>{{ trans('help.note') }}</strong></h2>
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
                    $str .= '<a target="_blankaaa" href="' . $href . '">' . $excel[$text][$lan] . '</a>';
                } else {
                    $str .= $excel[$v][$lan];
                }
            }
            $str .= '</p>';
        } elseif ($var[0] === '(' && $var[strlen($var) - 1] === ')') {
            preg_match('/\((.*)\)/', $var, $matches1);
            $str .= '<li>';
            foreach (explode('|', $matches1[1]) as $v) {
                if ($v[0] === '*' || $v[strlen($v) - 1] === '*') {
                    $v = str_replace('*', '', $v);
                    $str .= '<b>' . $excel[$v][$lan] . '</b>';
                } elseif ($v[strlen($v) - 1] === ']') {
                    $pattern = '/\[(.*)\]/';
                    preg_match($pattern, $v, $matches2);
                    $href = $matches2[1];
                    $text = preg_replace($pattern, '', $v);
                    $str .= '<a target="_blank bbbb" href="' . $href . '">' . $excel[$text][$lan] . '</a>';
                } else {
                    $str .= $excel[$v][$lan];
                }
            }
            $str .= '</li>';
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
                    $locale = app()->getLocale();
                    $href_arr = explode(';', $href);
                    $href_c = count($href_arr);
                    if ($href_c === 2) {
                        list($cn, $en) = $href_arr;
                        $href = $locale === 'zh-cn' ? $cn : $en;
                    }
                    $text = preg_replace($pattern, '', $v);
                    $str .= '<a target="_blankccc" href="' . $href . '">' . $excel[$text][$lan] . '</a>';
                } else {
                    $str .= $excel[$v][$lan];
                }
            }
            $str .= '</p>';
        }
    }
    echo $str;
    ?>
</div>
