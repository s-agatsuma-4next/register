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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/item', 'ItemController@index');
Route::get('/item/index', 'ItemController@index');
Route::get('/item/show/{id}', 'ItemController@show');
Route::get('/item/edit/{id}', 'ItemController@edit');
Route::get('/item/destroy/{id}', 'ItemController@destroy');

// post
Route::post('/item/store', 'ItemController@store');
Route::post('/item/update/{id}', 'ItemController@update');

// resource
Route::resource('item', 'ItemController');


Route::get('/cash', 'CashController@index');
Route::get('/cash/edit', 'CashController@edit');
Route::post('/cash/store', 'CashController@store');