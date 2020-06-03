<ol>
    <?php
    $str = '';
    if ($lan === 'zh-cn') {
        $dh = '，';
        $jh = '。';
    } else {
        $dh = ',';
        $jh = '.';
    }
    foreach ($vars as $k => $var) {
        if (strpos($var, '$$') !== false) {
            $var = str_replace('$$', '', $var);
            $str .= '<img src="' . $var . '">';
            continue;
        }
        if (strpos($var, '(') !== false) {
            $var = str_replace('(', '', $var);
            $var = str_replace(')', '', $var);
            $str .= '<li>' . $excel[$var][$lan] . $dh;
        } elseif (strpos($var, ')') !== false) {
            $var = str_replace('(', '', $var);
            $var = str_replace(')', '', $var);
            $str .= $excel[$var][$lan] . $dh . $jh . '</li>';
        }
    }
    echo str_replace($dh . $jh, $jh, $str);
    ?>
</ol>
