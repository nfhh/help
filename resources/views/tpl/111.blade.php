<?php
$str = '<table class="table my-table">';
$arr = [];
foreach ($vars as $var) {
    $arr[] = explode('|', $var);
}
foreach ($arr as $v) {
    $str .= '<tr>';
    foreach ($v as $vv) {
        $str .= '<td>';
        if ($vv[0] === '*' || $vv[strlen($vv) - 1] === '*') {
            $vv = str_replace('*', '', $vv);
            $str .= '<b>' . $excel[$vv][$lan] . '</b>';
        } else {
            $str .= $excel[$vv][$lan];
        }
        $str .= '</td>';
    }
    $str .= '</tr>';
}
$str .= '</table>';
echo $str;
?>
