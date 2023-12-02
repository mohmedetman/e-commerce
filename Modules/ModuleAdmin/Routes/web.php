<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
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
//Modules\ModuleAdmin\Http\Controllers\LoginController.php
Route::group(['prefix'=>'admin','middleware'=>'guest:admin'],function (){
    Route::get('login', 'LoginController@login')->name('login');
    Route::post('post_login', 'LoginController@post_login')->name('admin.login');

});
// Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
//     ], function(){ //...
        Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function (){
            Route::get('/', 'ModuleAdminController@index')->name('admin.dashboard');
            Route::get('/edit_admin', 'ModuleAdminController@edit_admin')->name('admin.edit_admin');
            Route::post('/edit_profile_admin', 'ModuleAdminController@edit_profile_admin')->name('admin.edit_profile_admin');
            Route::get('logout', 'LoginController@logout')->name('admin.logout');
          Route::group(['prefix'=>'settings'],function(){
            Route::get('/edit_settings/{type}', 'SettingsController@edit_settings')->name('show_setting');
            Route::post('/edit_settings', 'SettingsController@post_edit_settings')->name('admin.edit.sittings');
          // });
        
          
          

        
        });
    });