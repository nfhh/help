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

Route::get('/', function () {
    return redirect('/faqs/tnas-faqs');
});

Route::get('/test', function () {

});

Auth::routes();
Route::get('/posts/{var}', 'PostsController@show');
Route::get('/faqs/{var}', 'FaqController@index');
Route::get('/faqs/{var}/{title}', 'FaqController@show');
Route::get('/toshelp', 'HelpController@index');
Route::get('/toshelp/{var}', 'HelpController@show');
Route::get('/download', 'DownloadController@show');
Route::get('/download/packages', 'DownloadController@index');
Route::get('/download/app', 'DownloadController@downapp');
Route::get('/quickguide', 'ProductController@show');
Route::get('/quickguide/steps', 'ProductController@index');
Route::get('/search', 'SearchController@index');
Route::post('/feedback', 'FeedbackController@store')->middleware('throttle:60,1');

Route::prefix(config('app.admin_dir'))->name('admin.')->namespace('Admin\Auth')->group(function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
});

Route::prefix(config('app.admin_dir'))->name('admin.')->namespace('Admin')->middleware('auth:admin')->group(function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/edit', 'AdminController@edit')->name('admin.edit');
    Route::post('/update', 'AdminController@update')->name('admin.update');
    Route::delete('/category/truncate', 'CategoryController@truncate')->name('category.truncate');
    Route::resource('/category', 'CategoryController');
    Route::resource('/article', 'ArticleController');
    Route::post('/file/destroy', 'FileController@destroy')->name('file.destroy');
    Route::resource('/file', 'FileController')->except('destroy');
    Route::resource('/product', 'ProductController');
    Route::get('/guide_excel/create', 'GuideExcelController@create')->name('guide_excel.create');
    Route::post('/guide_excel/store', 'GuideExcelController@store')->name('guide_excel.store');
    Route::get('/product/step/create', 'ProductController@createStep')->name('product.steps.create');
    Route::get('/product/step/{product_id}', 'ProductController@listStepByproductId')->name('product.steps')->where('product_id', '[0-9]+');
    Route::post('/product/steps/copy', 'ProductController@copySteps')->name('product.steps.copy');
    Route::get('/product/step/{step_id}/edit', 'ProductController@editStep')->name('product.steps.edit');
    Route::post('/product/step/store', 'ProductController@storeStep')->name('product.steps.store');
    Route::put('/product/step/update', 'ProductController@updateStep')->name('product.steps.update');
    Route::post('/product/step/destroy', 'ProductController@destroyStep')->name('product.steps.destroy');
    Route::resource('/step', 'StepController');
    Route::resource('/dir', 'DirController');

    Route::get('/subject', 'SubjectController@index')->name('subject.index');
    Route::get('/subject/create', 'SubjectController@create')->name('subject.create');
    Route::post('/subject/store', 'SubjectController@store')->name('subject.store');
    Route::get('/subject/edit', 'SubjectController@edit')->name('subject.edit');
    Route::put('/subject/update', 'SubjectController@update')->name('subject.update');
    Route::delete('/subject/destroy/{id}', 'SubjectController@destroy')->name('subject.destroy');

    Route::resource('/faq', 'FaqController');
    Route::resource('/download', 'DownloadController');
    Route::resource('/remark', 'RemarkController');
    Route::get('/asset', 'AssetController@index')->name('asset.index');
    Route::get('/asset/create', 'AssetController@create')->name('asset.create');
    Route::post('/asset', 'AssetController@store')->name('asset.store');
    Route::post('/asset/destroy', 'AssetController@destroy')->name('asset.destroy');
    Route::get('/feedback', 'FeedbackController@index')->name('feedback.index');
    Route::post('/feedback/update', 'FeedbackController@update')->name('feedback.update');
    Route::get('/var', 'VarController@index')->name('var.index');
    Route::post('/var', 'VarController@handle')->name('var.handle');
    Route::get('/alioss', 'AliossController@dir')->name('alioss.dir');
    Route::get('/alioss/index', 'AliossController@index')->name('alioss.index');

    Route::get('/email', 'EmailController@index')->name('email.index');
    Route::post('/export', 'EmailController@export')->name('email.export');
});
