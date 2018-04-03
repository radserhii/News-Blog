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

Route::get('/', 'CategoryController@index');
Route::get('category/{id}', 'CategoryController@show')->name('category');

Route::get('news/{id?}', 'NewsController@show')->name('news');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
