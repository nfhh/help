<ol>
    <?php
    $str = '';
    foreach ($vars as $var) {
        if ($var[0] === '$' && $var[strlen($var) - 1] === '$') {
            preg_match('/\$(.*)\$/', $var, $matches1);
            foreach (explode('|', $matches1[1]) as $img) {
                $str .= '<img src="' . $img . '" class="img-fluid">';
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
        $str .= '</p></li>';
    }
    echo $str;
    ?>
</ol>
