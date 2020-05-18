<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/', 'ProductController@index');
Route::get('/product/{id}', 'ProductController@show')->name('product');

Route::post('/basket/add', 'BasketController@create')->name('basket.add');
Route::post('/basket/remove', 'BasketController@remove')->name('basket.remove');
Route::put('/basket/more', 'BasketController@moreQt')->name('basket.more');
Route::put('/basket/less', 'BasketController@lessQt')->name('basket.less');

Route::get('/payment', 'BasketController@toPayment')->name('payment');
Route::post('/paid', 'OrderController@create')->name('paid');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@index')->name('home');

Route::get('/basket', 'BasketController@index')->name('home');


