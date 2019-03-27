<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('locations', 'Api\LocationController@index');
Route::get('outside-wedding', 'Api\LocationController@outsideWedding');
Route::get('friendship-workshop', 'Api\LocationController@friendshipWorkshop');
Route::get('customer-gratitude', 'Api\LocationController@customerGratitude');
Route::get('birthday', 'Api\LocationController@birthday');
Route::get('music-fashion', 'Api\LocationController@musicFashion');
Route::get('outside-catering', 'Api\LocationController@outsideCatering');
Route::get('menu', 'Api\MenuController@index');
