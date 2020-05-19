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

});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix(env('ADMIN_PRE'))->name('admin.')->namespace('Admin\Auth')->group(function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
});

Route::prefix(env('ADMIN_PRE'))->name('admin.')->namespace('Admin')->middleware('auth:admin')->group(function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('/category', 'CategoryController');
    Route::resource('/article', 'ArticleController');
    Route::resource('/file', 'FileController');
    Route::resource('/product', 'ProductController');
    Route::resource('/step', 'StepController');
    Route::resource('/dir', 'DirController');
});
