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

Auth::routes();

Route::get('/home', 'HomeController@index');
