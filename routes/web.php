<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\AttributeGroupController;
use App\Http\Controllers\Admin\Auth\AuthAdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CollectionController;
use App\Http\Controllers\Admin\JewelryLineController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\Client\Auth\AuthClientController;
use App\Http\Controllers\Client\Auth\AuthSocialController;
use App\Http\Controllers\Client\CartClientController;
use App\Http\Controllers\Client\DetailCategoryController;
use App\Http\Controllers\Client\DetailController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\OrderClientController;
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
        Route::resource('order', OrderController::class);
        Route::resource('voucher', VoucherController::class);
        Route::resource('banner', BannerController::class);

        Route::get('/get-product-types/{categoryId}', [ProductController::class, 'getProductTypes']);

        Route::get('/export-invoice/{orderId}', [OrderController::class, 'exportInvoice'])->name('order.export.invoice');




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



            Route::delete('/{id}', [UserController::class, 'destroy'])->name('account.destroy');
        });
    });
});




// Route::get('/', [HomeController::class, 'index'])->name('client.home');
Route::middleware('client')->group(function () {
    // CLIENT DASHBOARD
    Route::get('/', [HomeController::class, 'index'])->name('client.home');
    Route::get('/get-product-by-collections/{id}', [HomeController::class, 'getProductByCollections'])
        ->name('client.home.getProductclt');
    Route::get('/jewelry-line/{id}', [HomeController::class, 'getJewelryLines']);

    // Detail Product Page
    Route::get('/detail-product/{id}', [DetailController::class, 'show'])->name('client.detail');

    //Cart Page
    Route::post('/cart/add-to-cart', [CartClientController::class, 'addCart'])->name('client.cart.add');
    Route::get('/cart/show-cart', [CartClientController::class, 'showCart'])->name('client.cart.show');
    Route::post('/cart/delete', [CartClientController::class, 'delete'])->name('client.cart.delete');
    Route::post('/cart/delete-all', [CartClientController::class, 'deleteAll'])->name('client.cart.deleteAll');


    //Order Page

    Route::post('/order/checkout', [OrderClientController::class, 'checkOut'])->name('client.order.checkout');
    Route::post('/order/order-process', [OrderClientController::class, 'orderProcess'])->name('client.order.process');
    Route::get('/order/order-success', [OrderClientController::class, 'showOrderSuccess'])->name('client.order.success');
    Route::post('/order/apply-voucher', [OrderClientController::class, 'applyVoucher'])->name('order.apply.voucher');
    Route::post('/order/remove-voucher', [OrderClientController::class, 'removeVoucher'])->name('order.remove.voucher');

    Route::get('/category/{type}/{id}', [DetailCategoryController::class, 'show'])->name('category.show');


    // Authentication client
    Route::get('login', [AuthClientController::class, 'showLoginForm'])->name('client.login.form');
    Route::get('register', [AuthClientController::class, 'showRegisterForm'])->name('client.register.form');
    Route::post('login-process', [AuthClientController::class, 'login'])->name('client.login.process');
    Route::post('register-process', [AuthClientController::class, 'register'])->name('client.register.process');
    Route::get('logout', [AuthClientController::class, 'logout'])->name('client.logout.process');

    Route::get('auth/google', [AuthSocialController::class, 'redirectToGoogle']);
    Route::get('auth/google/callback', [AuthSocialController::class, 'handleGoogleCallback']);
});
