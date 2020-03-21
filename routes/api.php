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

Route::post('/productos','ProductosController@addProducto')->name('create-productos');


Route::group(["namespace"=>"Auth"],function() {
    Route::post('/usuarios','RegisterController@register')->name('create-usuarios'); // actually calls \App\Http\Controllers\AdminPanel\AdminControllers because of the namespace
});
