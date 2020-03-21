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

use App\Productos;
use App\Proveedor;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->get('/lista_usuarios', function () {
    return view('/lists/usuarios',['usuarios' => User::all()]);
});

Route::middleware('auth')->get('/lista_productos', function () {
    return view('/lists/productos',['productos' => Productos::all()]);
});

Route::get('/create_productos', 'ProductosController@visual');

Route::get('/search_usuarios',function(){
    $q = Input::get ( 'q' );
    $usuarios = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
    if(count($usuarios) > 0)
        return view('welcome')->withDetails($usuarios)->withQuery ( $q );
    else return view ('welcome')->withMessage('No Details found. Try to search again !');
});
