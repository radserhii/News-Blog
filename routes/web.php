<?php

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

Route::get('/', 'IndexController@index')->name('index');

Route::get('category/{id}', 'CategoryController@show')->name('category');

Route::get('news/{id}', 'NewsController@show')->name('news');
Route::get('news_tag/{id}', 'TagController@showNewsWithTag')->name('news_tag');
Route::get('news_tag_name/{name?}', 'TagController@showNewsWithTagName')->name('news_tag_name');

Route::post('comment_create/{newsId}', 'CommentController@create')->name('comment_create');
Route::get('comments_by_user/{id}', 'CommentController@getCommentsByUser')->name('comments_by_user');

Route::group([ 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function()
{
    Route::get('/', function() {
       return view('dashboard.index');
    })->name('admin.dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
