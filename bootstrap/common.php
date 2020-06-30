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
                if (!$cell->getFormattedValue()) {
                    continue;
                }
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

