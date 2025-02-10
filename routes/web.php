<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\AttributeGroupController;
use App\Http\Controllers\Admin\Auth\AuthAdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CollectionController;
use App\Http\Controllers\Admin\JewelryLineController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductTypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::resource('/', AdminController::class);
Route::prefix('admin')->group(function () {
    Route::get('login', [AuthAdminController::class, 'showLoginForm'])->name('login.form');
    Route::post('login-process', [AuthAdminController::class, 'login'])->name('login.process');
    Route::get('logout', [AuthAdminController::class, 'logout'])->name('logout.process');


    Route::middleware('admin')->group(function () {
        // Quản lí sản phẩm
        Route::resource('/', AdminController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('product-type', ProductTypeController::class);
        Route::resource('jewelry-line', JewelryLineController::class);
        Route::resource('collection', CollectionController::class);
        Route::resource('attribute-group', AttributeGroupController::class);
        Route::resource('attribute', AttributeController::class);
        Route::resource('product', ProductController::class);
    });
});
