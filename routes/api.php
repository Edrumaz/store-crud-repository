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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// User routes
Route::get('/users', 'UserApiController@index');
Route::get('/users/{user}', 'UserApiController@show');
Route::post('/users/create', 'UserApiController@store');
Route::patch('/users/{user}/edit', 'UserApiController@update');
Route::delete('/users/{user}/delete', 'UserApiController@destroy');

// Product routes
Route::get('/products', 'ProductApiController@index');
Route::get('/products/{product}', 'ProductApiController@show');
Route::post('/products/create', 'ProductApiController@store');
Route::patch('/products/{product}/edit', 'ProductApiController@update');
Route::delete('/products/{product}/delete', 'ProductApiController@destroy');

// Search routes
Route::get('/search-user', 'UserSearchController@get');
Route::post('/search-user', 'UserSearchController@index');
Route::get('/search-product', 'ProductSearchController@get');
Route::post('/search-product', 'ProductSearchController@index');