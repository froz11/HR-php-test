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

Route::resource('orders', 'OrderController', ['only' => [
    'index', 'update', 'edit'
]]);
Route::get('orders-group', 'OrderController@indexGroup')->name('groupOrders');
Route::resource('products', 'ProductController', ['only' => [
    'index', 'update'
]]);


Route::get('temperature', 'TemperatureController@index')->name('temper');