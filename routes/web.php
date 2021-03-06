<?php

use Illuminate\Support\Facades\Route;
use App\Mail\New_News_Post;
use App\Mail\New_Auction_Post;
use App\News;
use App\Auctions;

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

Route::resource('dashboard/auctions','AuctionsController')->middleware('auth');
Route::resource('dashboard/gallery','GalleryController',['only' => ['index','store','destroy']])->middleware('auth');

Route::get('dashboard/subscribers','SubscribersController@index')->name('subscribers.index')->middleware('auth');
Route::delete('dashboard/subscribers/{subscriber}','SubscribersController@destroy')->name('subscribers.destroy');

Route::get('dashboard/users','UserController@index')->name('users.index')->middleware('auth');
Route::patch('dashboard/users/{user}','UserController@update')->name('users.update')->middleware('auth');

Route::get('mail',function(){
    $news=News::find(2);
    return new New_News_Post($news);
});

Route::get('mail-auction',function(){
    $auctions=Auctions::find(2);
    return new New_Auction_Post($auctions);
});