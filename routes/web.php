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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

// User routes
Route::get('/users', 'UsersController@index');
Route::get('/users/create', 'UsersController@create');
Route::get('/users/{user}', 'UsersController@show');
Route::post('/users/create', 'UsersController@store');
Route::get('/users/{user}/edit', 'UsersController@edit');
Route::patch('/users/{user}/edit', 'UsersController@update');
Route::delete('/users/{user}/delete', 'UsersController@destroy');

// Product routes
Route::get('/products', 'ProductsController@index');
Route::get('/products/create', 'ProductsController@create');
Route::get('/products/{product}', 'ProductsController@show');
Route::post('/products/create', 'ProductsController@store');
Route::get('/products/{product}/edit', 'ProductsController@edit');
Route::patch('/products/{product}/edit', 'ProductsController@update');
Route::delete('/products/{product}/delete', 'ProductsController@destroy');

// Search routes
Route::get('/search-user', 'UserSearchController@get');
Route::post('/search-user', 'UserSearchController@index');
Route::get('/search-product', 'ProductSearchController@get');
Route::post('/search-product', 'ProductSearchController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
