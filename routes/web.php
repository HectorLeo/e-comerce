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

/*Route :: get ('/',function(){
    return view('seguridad.login');
});*/
Route::get('/', 'Auth\LoginController@login')->name('login');

Route::get('/inicio', 'Admin\AdminController@index' )->name('inicio');

Route::get('/index', 'PaginasController@contenido' )->name('index');

Route::get('/producto', 'Admin\ProductosController@interfaceagregar' )->name('producto');
Route::post('producto', 'Admin\ProductosController@agregarbd' )->name('producto');

Route::get('/categoria', 'Admin\CategoriasController@interfaceagregar')->name('categoria');
Route::post('categoria', 'Admin\CategoriasController@agregarbd')->name('categoria');
/** */