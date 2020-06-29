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
|[]
*/
Route::get('/test', function () {
    $data = [
        ['slug' => 'Table_of_Contents', 'zh-cn' => '目录', 'zh-hk' => '目錄'],
        ['slug' => 'Overview', 'zh-cn' => '概要', 'zh-hk' => '概要'],
    ];
});

Route::get('/', function () {
    return redirect('/toshelp');
});


Auth::routes();
Route::get('/faq', 'FaqController@index');
Route::get('/faq/{faq}', 'FaqController@show');
Route::get('/toshelp', 'HelpController@index');
Route::get('/download', 'DownloadController@show');
Route::get('/download/packages', 'DownloadController@index');
Route::get('/quickguide', 'ProductController@show');
Route::get('/quickguide/steps', 'ProductController@index');
Route::get('/search', 'SearchController@index');
Route::post('/feedback', 'FeedbackController@store')->middleware('throttle:60,1');

Route::prefix(env('ADMIN_PRE'))->name('admin.')->namespace('Admin\Auth')->group(function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
});

Route::prefix(env('ADMIN_PRE'))->name('admin.')->namespace('Admin')->middleware('auth:admin')->group(function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/edit', 'AdminController@edit')->name('admin.edit');
    Route::post('/update', 'AdminController@update')->name('admin.update');
    Route::resource('/category', 'CategoryController');
    Route::resource('/article', 'ArticleController');
    Route::resource('/file', 'FileController');
    Route::resource('/product', 'ProductController');
    Route::get('/product/step/create', 'ProductController@createStep')->name('product.steps.create');
    Route::get('/product/step/{product_id}', 'ProductController@listStepByproductId')->name('product.steps')->where('product_id', '[0-9]+');
    Route::post('/product/steps/copy', 'ProductController@copySteps')->name('product.steps.copy');
    Route::get('/product/step/{step_id}/edit', 'ProductController@editStep')->name('product.steps.edit');
    Route::post('/product/step/store', 'ProductController@storeStep')->name('product.steps.store');
    Route::put('/product/step/update', 'ProductController@updateStep')->name('product.steps.update');
    Route::resource('/step', 'StepController');
    Route::resource('/dir', 'DirController');
    Route::resource('/subject', 'SubjectController')->except('destroy');
    Route::resource('/faq', 'FaqController');
    Route::resource('/download', 'DownloadController');
    Route::get('/asset', 'AssetController@index')->name('asset.index');
    Route::get('/asset/create', 'AssetController@create')->name('asset.create');
    Route::post('/asset', 'AssetController@store')->name('asset.store');
    Route::post('/asset/destroy', 'AssetController@destroy')->name('asset.destroy');
    Route::get('/feedback', 'FeedbackController@index')->name('feedback.index');
    Route::post('/feedback/update', 'FeedbackController@update')->name('feedback.update');
    Route::get('/var', 'VarController@index')->name('var.index');
    Route::post('/var', 'VarController@handle')->name('var.handle');
});
