
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

Route::get('/', 'App\Http\Controllers\ProductsController@index' )->name('pocetna');

Auth::routes();

Route::post('/cartadd/{id}', 'App\Http\Controllers\ProductsController@addToCart' );
Route::get('/cartdel/{id}', 'App\Http\Controllers\ProductsController@removeFromCart');
Route::post('/cartup/{id}', 'App\Http\Controllers\ProductsController@updateCart');
Route::get('/cart', 'App\Http\Controllers\ProductsController@cart' );

Route::post('/kupi', 'App\Http\Controllers\ProductsController@buyFromCart' );

Route::get('/home', 'App\Http\Controllers\ProductsController@index' );

Route::get('/history', 'App\Http\Controllers\ProductsController@history' )->name('history');
Route::get('/historyAdmin', 'App\Http\Controllers\ProductsController@historyAdmin' )->name('historyAdmin');

Route::get('/profil', 'App\Http\Controllers\UserController@profil' )->name('profil');
Route::post('/changepass', 'App\Http\Controllers\UserController@changepass' );







