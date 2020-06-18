<p>
    <?php
    $str = '';
    foreach ($vars as $k => $var) {
        if (strpos($var, '*') !== false) {
            $var = str_replace('*', '', $var);
            $varx = '<b>' . $excel[$var][$lan] . '</b>';
        } elseif (strpos($var, '&') !== false) {
            $var = str_replace('&', '', $var);
            if (strpos($var, '+') !== false){
                $pattern = '/\+(.*)\+/';
                preg_match($pattern, $var, $matches);
                $var = preg_replace($pattern, '', $var);
                $varx = '<a href="' . $matches[1] . '">' . $excel[$var][$lan] . '</a>';
            }
        } else {
            $varx = $excel[$var][$lan];
        }
        $str .= $varx;
    }
    echo $str;
    ?>
</p>
