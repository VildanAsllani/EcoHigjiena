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

Route::get('/', function () {
    return view('welcome');
});

Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::resource('dashboard/news','NewsController')->middleware('auth');
// Route::get('/check_slug', 'NewsController@check_slug')->name('news.check_slug');

Route::resource('dashboard/comments','CommentsController',['only' => ['destroy']])->middleware('auth');
Route::get('dashboard/confirm/{comments}','CommentsController@confirm')->name('confirm')->middleware('auth');