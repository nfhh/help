<?php

use PhpOffice\PhpSpreadsheet\IOFactory;

function readExcel($file)
{
    $sh = [];
    $arr = [];
    $ce = [];
    $excel_data = [];
    $spreadsheet = IOFactory::load($file);
    foreach ($spreadsheet->getWorksheetIterator() as $sheet) {
        foreach ($sheet->getRowIterator() as $key1 => $row) {
            if ($key1 == 1) {
                $a = $row->getCellIterator();
                foreach ($a as $aa) {
                    $arr[] = $aa->getFormattedValue();
                }
                continue;
            }
            $k = 0;
            foreach ($row->getCellIterator() as $key2 => $cell) {
                $data = $cell->getFormattedValue();
                if (!$data) {
                    continue;
                }
                $ce[$arr[$k]] = $data;
                $k++;
            }
            $excel_data[$ce[$arr[0]]] = $ce;
        }
        $sh[] = $excel_data;
    }
    $res = [];
    foreach ($sh[0] as $k => $v) {
        unset($v['var']);
        $res[$k] = $v;
    }
    return $res;
}

function readExcel2($file)
{
    $sheet_data = $row_data = $key_arr = [];
    $spreadsheet = IOFactory::load($file);
    foreach ($spreadsheet->getWorksheetIterator() as $sheet) {
        foreach ($sheet->getRowIterator() as $row) {
            if ($row->getRowIndex() === 1) {
                foreach ($row->getCellIterator() as $cell) {
                    $key_arr[] = $cell->getFormattedValue();
                }
                continue;
            }
            $i = 0;
            foreach ($row->getCellIterator() as $cell) {
                $i++;
/*                if (!$cell->getFormattedValue()) { // 字段值为空的字段会被过滤掉 并不是过滤空行
                    continue;
                }*/
                $row_data[$key_arr[$i - 1]] = $cell->getFormattedValue();
            }
            $sheet_data[] = $row_data;
        }
    }
    return $sheet_data;
}

function formatBytes($size, $precision = 2)
{
    if ($size > 0) {
        $size = (int)$size;
        $base = log($size) / log(1024);
        $suffixes = [' bytes', ' KB', ' MB', ' GB', ' TB'];

        return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
    }
    return $size;
}

function orderFormat($cate, $html = '--', $pid = 0, $level = 0)
{
    $arr = [];
    foreach ($cate as $v) {
        if ($v['parent_id'] == $pid) {
            $v['level'] = $level + 1;
            $v['html'] = str_repeat($html, $level);
            $arr[] = $v;
            $arr = array_merge($arr, orderFormat($cate, $html, $v['id'], $level + 1));
        }
    }
    return $arr;
}

function layerFormat($cate, $name = 'nodes', $pid = 0)
{
    $arr = [];
    foreach ($cate as $v) {
        if ($v['parent_id'] == $pid) {
            if (!empty(layerFormat($cate, $name, $v['id']))) {
                $v[$name] = layerFormat($cate, $name, $v['id']);
            }
            $arr[] = $v;
        }
    }
    return $arr;
}
