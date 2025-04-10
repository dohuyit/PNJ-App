<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\CartClientController;
use App\Http\Controllers\Client\OrderClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// api banner
Route::get('/banner/collections', [BannerController::class, 'getCollections']);
Route::get('/banner/jewelry-lines', [BannerController::class, 'getJewelryLines']);
Route::get('/banner/brands', [BannerController::class, 'getBrands']);


Route::prefix('location')->group(function () {
    Route::get('/districts/{city_id}', [UserController::class, 'getDistricts'])->name('location.districts');

    Route::get('/wards/{district_id}', [UserController::class, 'getWards'])->name('location.wards');
});

Route::prefix('cart')->group(function () {
    Route::post('/update-quantity', [CartClientController::class, 'updateQuantity'])->name('client.cart.updateQuantity');
    Route::post('/update-size', [CartClientController::class, 'updateSize'])->name('client.cart.updateSize');
});

Route::get('/calculate-shipping-fee', [OrderClientController::class, 'calculateShippingFee']);

// Route::middleware('client')->group(function () {
//     Route::prefix('order')->group(function () {
//         Route::post('/apply-voucher', [OrderClientController::class, 'applyVoucher'])->name('order.apply.voucher');
//         Route::post('/remove-voucher', [OrderClientController::class, 'removeVoucher'])->name('order.remove.voucher');
//     });
// });
