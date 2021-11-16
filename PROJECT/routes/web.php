<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TotalController;

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

Route::get('/user', 'UserController@index')->name('user');
Route::get('/product', 'ProductController@index')->name('product');
Route::get('/order', 'OrderController@index')->name('order');
Route::resource('laporan', 'LaporanController');
// Route::post('/total', 'laporanController@update')->name('total');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
