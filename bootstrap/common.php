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
