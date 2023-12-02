<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Brand\Http\Controllers\BrandController;
use Modules\Product\Http\Controllers\CategoryController;

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

// Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
//     ], function(){ //...
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::group(['prefix' => 'product_category'], function () {
        // Route::get('create',[CategoryController::class,'create']);
        Route::resource('/',  CategoryController::class);
        Route::get('/', [CategoryController::class, 'index'])->name('admin.product_category.index');
        Route::post('store', [CategoryController::class, 'store'])->name('admin.product_category.store');
    });
    Route::group(['prefix' => 'brand'], function () {
        // Route::get('create',[CategoryController::class,'create']);
        // Route::resource('/',  BrandController::class);
        Route::get('/create', [BrandController::class, 'create']);
        Route::get('/', [BrandController::class, 'index'])->name('admin.brand.index');
        Route::post('store', [BrandController::class, 'store'])->name('admin.brand.store');
    });
    // });



});