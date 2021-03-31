<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PageController;
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

Route::get('/', [PageController::class, 'index']);

Route::prefix('/admin')->namespace('Admin')->group(function () {
    // for login
    Route::match(['get', 'post'], '/login', [AdminController::class, 'login']);
    Route::group(['middleware' => ['admin']], function () {
        Route::get('dashboard', [AdminController::class, 'dashboard']);
        Route::get('settings', [AdminController::class, 'settings']);
        Route::get('logout', [AdminController::class, 'logout']);
        Route::post('check-current-pwd', [AdminController::class, 'checkCurrentPwd']);
        // route for change password
        Route::post('update-current-pwd', [AdminController::class, 'updateCurrentPwd']);
        // route for admin details 
        Route::match(['get', 'post'], 'update-admin-details', [AdminController::class, 'updateAdminDetails']);

        // sections
        Route::get('sections', [SectionController::class, 'sections']);
        Route::post('update-section-status', [SectionController::class, 'updateSectionStatus']);

        // categories
        Route::get('categories', [CategoryController::class, 'categories']);
        Route::post('update-category-status', [CategoryController::class, 'updateCategoryStatus']);

        // add and edit category 
        Route::match(['get', 'post'], 'add-edit-category/{id?}',  [CategoryController::class, 'addEditCategory']);

        // append category level
        Route::post('append-categories-level', [CategoryController::class, 'appendCategoryLevel']);

        // delete category imgae 
        Route::get('delete-category-image/{id}', [CategoryController::class, 'deleteCategoryImage']);

        // delete categort
        Route::get('delete-category/{id}', [CategoryController::class, 'deleteCategory']);
    });
});