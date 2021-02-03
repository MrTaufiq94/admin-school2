<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//posts
Route::get('/post', 'App\Http\Controllers\Api\PostController@index');
Route::get('/post/{id?}', 'App\Http\Controllers\Api\PostController@show');
Route::get('/homepage/post', 'App\Http\Controllers\Api\PostController@PostHomePage');

//events
Route::get('/event', 'App\Http\Controllers\Api\EventController@index');
Route::get('/event/{slug?}', 'App\Http\Controllers\Api\EventController@show');
Route::get('/homepage/event', 'App\Http\Controllers\Api\EventController@EventHomePage');

//sliders
Route::get('/slider', 'App\Http\Controllers\Api\SliderController@index');

//tags
Route::get('/tag', 'App\Http\Controllers\Api\TagController@index');
Route::get('/tag/{slug?}', 'App\Http\Controllers\Api\TagController@show');

//category
Route::get('/category', 'App\Http\Controllers\Api\CategoryController@index');
Route::get('/category/{slug?}', 'App\Http\Controllers\Api\CategoryController@show');

//photo
Route::get('/photo', 'App\Http\Controllers\Api\PhotoController@index');
Route::get('/homepage/photo', 'App\Http\Controllers\Api\PhotoController@PhotoHomePage');

//video
Route::get('/video', 'App\Http\Controllers\Api\VideoController@index');
Route::get('/homepage/video', 'App\Http\Controllers\Api\VideoController@VideoHomePage');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

