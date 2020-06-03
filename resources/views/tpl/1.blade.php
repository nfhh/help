<p>
    <?php
    dump($vars);
    $str = '';
    if ($lan === 'zh-cn') {
        $dh = '，';
        $jh = '。';
    } else {
        $dh = ',';
        $jh = '.';
    }
    foreach ($vars as $k => $var) {
        if (strpos($var, '*') !== false) {
            $var = str_replace('*', '', $var);
            $varx = '<b>' . $excel[$var][$lan] . '</b>';
        } else {
            $varx = $excel[$var][$lan];
        }
        $str .= $varx . $dh;
    }
    echo rtrim($str, $dh) . $jh;
    ?>
</p>
