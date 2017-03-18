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

// items
Route::get('/items', 'ItemController@index');
Route::get('/item/new', 'ItemController@new');
Route::get('/item/{item}/destroy', 'ItemController@destroy');
Route::get('/item/{item}/edit', 'ItemController@edit');
Route::post('/item/create', 'ItemController@create');
Route::post('/item/{item}/update', 'ItemController@update');

// orders
Route::get('/orders', 'OrderController@index');
Route::get('/order/new', 'OrderController@new');
Route::post('/order/create', 'OrderController@create');
Route::post('/order/{order}/active', 'OrderController@active');
Route::post('/order/{order}/pickup', 'OrderController@pickup');
Route::post('/order/{order}/completed', 'OrderController@completed');
Route::post('/order/{order}/cancel', 'OrderController@cancelled');
Route::post('/order/{order}/paid', 'OrderController@paid');
Route::get('/orders/pending', 'OrderController@pending');
Route::get('/orders/active', 'OrderController@getActive');
Route::get('/orders/ready', 'OrderController@getReady');

Auth::routes();

Route::get('/home', 'HomeController@index');
