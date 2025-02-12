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
use App\Http\Controllers\Client\Auth\AuthClientController;
use App\Http\Controllers\Client\HomeController;
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

// ADMIN DASHBOARD
Route::prefix('admin')->group(function () {

    // Authentication admin
    Route::get('login', [AuthAdminController::class, 'showLoginForm'])->name('admin.login.form');
    Route::post('login-process', [AuthAdminController::class, 'login'])->name('admin.login.process');
    Route::get('logout', [AuthAdminController::class, 'logout'])->name('admin.logout.process');


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




// Route::get('/', [HomeController::class, 'index'])->name('client.home');
Route::middleware('client')->group(function () {
    // CLIENT DASHBOARD
    Route::get('/', [HomeController::class, 'index'])->name('client.home');

    // Authentication client
    Route::get('login', [AuthClientController::class, 'showLoginForm'])->name('client.login.form');
    Route::get('register', [AuthClientController::class, 'showRegisterForm'])->name('client.register.form');
    Route::post('login-process', [AuthClientController::class, 'login'])->name('client.login.process');
    Route::post('register-process', [AuthClientController::class, 'register'])->name('client.register.process');
    Route::get('logout', [AuthClientController::class, 'logout'])->name('client.logout.process');
});
