<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function () {
    $sh = [];
    $arr = [];
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('fy.xlsx'); // 加载文件
    foreach ($spreadsheet->getWorksheetIterator() as $sheet) { // 使用sheet迭代器循环取sheet
        $excel_data = [];
        foreach ($sheet->getRowIterator() as $key1 => $row) { // 使用row迭代器逐行处理
            $ce = array();
            if ($key1 == 1) {
                $a = $row->getCellIterator();
                foreach ($a as $aa) {
                    $arr[] = $aa->getValue();
                }
                continue;
            }
            $k = 0;
            foreach ($row->getCellIterator() as $key2 => $cell) { // 逐列读取
                $data = $cell->getValue(); // 获取单元格数据
//                echo $data.' ';// 即一个一个单元格取
                $ce[$arr[$k]] = $data;
                $k++;
            }
            $excel_data[$ce[$arr[2]]] = $ce;
        }
        $sh[] = $excel_data;
    }
    dd($sh);
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Admin\Auth\LoginController@login');
Route::get('/admin/home', 'Admin\HomeController@index');
Route::prefix(env('ADMIN_PRE'))->name('admin.')->namespace('Admin')->middleware('auth:admin')->group(function () {
    Route::resource('/category', 'CategoryController');
    Route::resource('/article', 'ArticleController');
});
