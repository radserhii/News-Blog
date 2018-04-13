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
//    Category CRUD
    Route::get('/', 'AdminController@indexCat')->name('admin.dashboard');
    Route::post('category_store', 'AdminController@storeCat')->name('dashboard.category.store');
    Route::get('category_edit/{id}', 'AdminController@editCat')->name('dashboard.category.edit');
    Route::post('category_update/{id}', 'AdminController@updateCat')->name('dashboard.category.update');
    Route::get('category_destroy/{id}', 'AdminController@destroyCat')->name('dashboard.category.destroy');
//    News CRUD
    Route::get('news', 'AdminController@indexNews')->name('dashboard.news');
    Route::get('news_create', 'AdminController@createNews')->name('dashboard.news.create');
    Route::post('news_store', 'AdminController@storeNews')->name('dashboard.news.store');
    Route::get('news_destroy/{id}', 'AdminController@destroyNews')->name('dashboard.news.destroy');
//    Menu CRUD
    Route::get('menu', 'AdminController@indexMenu')->name('dashboard.menu');
    Route::get('menu_create', 'AdminController@createMenu')->name('dashboard.menu.create');
    Route::post('menu_store', 'AdminController@storeMenu')->name('dashboard.menu.store');
    Route::get('menu_destroy/{id}', 'AdminController@destroyMenu')->name('dashboard.menu.destroy');
//    Background Style
    Route::get('style', 'StyleController@index')->name('dashboard.style');
    Route::post('style_store', 'StyleController@store')->name('dashboard.style.store');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
