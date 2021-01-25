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

Auth::routes();

Route::get('/', 'App\Http\Controllers\ProductsController@index' )->name('pocetna');



Route::post('/cartadd/{id}', 'App\Http\Controllers\ProductsController@addToCart' )->name('cartadd');
Route::get('/cartdel/{id}', 'App\Http\Controllers\ProductsController@removeFromCart');
Route::post('/cartup/{id}', 'App\Http\Controllers\ProductsController@updateCart');
Route::get('/cart', 'App\Http\Controllers\ProductsController@cart' )->name('cart');

Route::post('/kupi', 'App\Http\Controllers\ProductsController@buyFromCart')->name('kupi');

Route::get('/home', 'App\Http\Controllers\ProductsController@index' );

Route::get('/history', 'App\Http\Controllers\ProductsController@history' )->name('history');
Route::get('/historyAdmin', 'App\Http\Controllers\ProductsController@historyAdmin' )->name('historyAdmin');

Route::get('/profil', 'App\Http\Controllers\UserController@profil' )->name('profil');
Route::post('/changepass', 'App\Http\Controllers\UserController@changepass' );

Route::get('/show/{id}', 'App\Http\Controllers\ProductsController@show');
Route::get('/addprod', 'App\Http\Controllers\ProductsController@create')->name('addprod');
Route::post('/storeprod', 'App\Http\Controllers\ProductsController@store')->name('storeprod');
Route::post('/changeamount/{id}', 'App\Http\Controllers\ProductsController@changeamount');

