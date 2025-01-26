<?php

use App\Http\Controllers\Admin\AttributeGroupController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CollectionController;
use App\Http\Controllers\Admin\JewelryLineController;
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

Route::get('/', function () {
    return view("Backend.admin");
});
Route::resource('admin/category', CategoryController::class);
Route::resource('admin/product-type', ProductTypeController::class);
Route::resource('admin/jewelry-line', JewelryLineController::class);
Route::resource('admin/collection', CollectionController::class);
Route::resource('admin/attribute-group', AttributeGroupController::class);
