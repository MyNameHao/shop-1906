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

//Route::get('/', function () {
//    return view('testimg');
//});

Route::get('/imgs', function () {
    return view('testimg');
});

Route::get('/','index\IndexController@index');
Route::get('/goods/single','index\ShopSingle@index');
Route::get('/cart/shop','index\CartController@cart');
Route::get('/cart','index\CartController@index');
Route::post('/test','index\IndexController@test');
