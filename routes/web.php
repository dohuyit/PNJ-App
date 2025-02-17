<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\AttributeGroupController;
use App\Http\Controllers\Admin\Auth\AuthAdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CollectionController;
use App\Http\Controllers\Admin\JewelryLineController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\Admin\UserController;
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
        Route::resource('brand', BrandController::class);
        Route::resource('attribute-group', AttributeGroupController::class);
        Route::resource('attribute', AttributeController::class);
        Route::resource('product', ProductController::class);

        // Quản lí tài khoản khách hàng và admin
        Route::prefix('account')->group(function () {
            // Tài khoản quản trị
            Route::get('employee-admin', [UserController::class, 'indexAdminAccounts'])->name('employee-admin.index');
            Route::post('employee-admin/store', [UserController::class, 'storeAdminAccount'])->name('employee-admin.store');
            Route::get('employee-admin/{id}/edit', [UserController::class, 'editAdminAccount'])->name('employee-admin.edit');
            Route::put('employee-admin/update/{id}', [UserController::class, 'updateAdminAccount'])->name('employee-admin.update');


            // Tài khoản người dùng
            Route::get('customer', [UserController::class, 'indexCustomerAccounts'])->name('customer.index');
            Route::get('customer/{id}/edit', [UserController::class, 'editCustomerAccount'])->name('customer.edit');
            Route::put('customer/update/{id}', [UserController::class, 'updateCustomerAccount'])->name('customer.update');

            // API lấy quận/huyện theo thành phố
            Route::get('customer/districts/{city_id}', [UserController::class, 'getDistricts'])->name('customer.districts');

            // API lấy xã/phường theo quận/huyện
            Route::get('customer/wards/{district_id}', [UserController::class, 'getWards'])->name('customer.wards');

            Route::delete('/{id}', [UserController::class, 'destroy'])->name('account.destroy');
        });
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
