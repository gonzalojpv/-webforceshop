<?php

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


Route::get('/{any}', 'SpaController@index')->where('any', '.*');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'HomeController@dash')->name('admin')->middleware('auth', 'admin');


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin'], 'as' => 'admin.'], function() {
    Route::resources([
        'users' => 'Admin\UserController',
        'categories' => 'Admin\CategoryController',
        'products' => 'Admin\ProductController',
    ]);
});
