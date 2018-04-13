<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('get_categories', 'ApiController@getCategories');
Route::post('get_news', 'ApiController@getNews');
Route::get('get_count/{id}', 'ApiController@getCount');
Route::post('update_count/{id}', 'ApiController@updateCount');

Route::get('get_tags', 'ApiController@getTags');

Route::get('news_comments/{id}', 'ApiController@getNewsComments');
Route::get('comment_like_counter/{commentId}/{action}', 'ApiController@commentLikeCounter');

Route::get('styles', 'ApiController@getStyles');

