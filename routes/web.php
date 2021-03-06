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
Route::get('/', 'Admin\\AdminController@index');

Auth::routes();

Route::get('/user', 'Admin\\UserController@getUserAndConfirmation')->middleware('auth');

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin', 'auth']], function () {
    Route::resource('permission', 'Admin\\PermissionController');
    Route::resource('role', 'Admin\\RoleController');
    Route::resource('user', 'Admin\\UserController');
    Route::resource('location', 'Admin\\LocationController');
    Route::resource('menu', 'Admin\\MenuController');
    Route::resource('dish', 'Admin\\DishController');
    Route::resource('confirmation', 'Admin\\ConfirmationController');
    Route::get('/', 'Admin\\AdminController@dashboard');
});

Route::get('/home', 'HomeController@index')->name('home');
