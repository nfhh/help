<?php

use PhpOffice\PhpSpreadsheet\IOFactory;

function readExcel($file)
{
    $sh = [];
    $arr = [];
    $spreadsheet = IOFactory::load($file);
    foreach ($spreadsheet->getWorksheetIterator() as $sheet) {
        $excel_data = [];
        foreach ($sheet->getRowIterator() as $key1 => $row) {
            $ce = array();
            if ($key1 == 1) {
                $a = $row->getCellIterator();
                foreach ($a as $aa) {
                    $arr[] = $aa->getValue();
                }
                continue;
            }
            $k = 0;
            foreach ($row->getCellIterator() as $key2 => $cell) {
                $data = $cell->getValue();
                $ce[$arr[$k]] = $data;
                $k++;
            }
            $excel_data[$ce[$arr[2]]] = $ce;
        }
        $sh[] = $excel_data;
    }
    return $sh[0];
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
