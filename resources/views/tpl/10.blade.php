<div class="alert alert-warning">
    <h2 class="h6"><strong>{{ trans('help.note') }}</strong></h2>
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
        if (strpos($var, '{') !== false) {
            $var = str_replace('{', '', $var);
            $var = str_replace('}', '', $var);
            $str .= '<p>';
            if (strpos($var, '*') !== false) {
                $var = str_replace('*', '', $var);
                $varx = '<b>' . $excel[$var][$lan] . '</b>';
            } else {
                $varx = $excel[$var][$lan];
            }
            $str .= $varx . $dh;
        } elseif (strpos($var, '}') !== false) {
            $var = str_replace('{', '', $var);
            $var = str_replace('}', '', $var);
            if (strpos($var, '*') !== false) {
                $var = str_replace('*', '', $var);
                $varx = '<b>' . $excel[$var][$lan] . '</b>';
            } else {
                $varx = $excel[$var][$lan];
            }
            $str .= $varx . $dh . $jh . '</p>';
        }
    }
    echo str_replace($dh . $jh, $jh, $str);
    ?>
</div>
