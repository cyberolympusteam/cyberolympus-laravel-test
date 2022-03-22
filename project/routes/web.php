<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\{ProductCategoryController, ProductController};
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

Route::redirect('/login', [AuthenticatedSessionController::class, 'create']);

Route::group(['middleware' =>'auth'], function(){
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::resource('/category-product', ProductCategoryController::class);
    Route::resource('/product', ProductController::class);
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
