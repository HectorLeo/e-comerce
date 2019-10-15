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

//
Route::get('/', 'PaginasController@contenido' )->name('home');

Route::get('admin', 'seguridad\LoginController@index')->name('login');
Route::post('seguridad/login', 'seguridad\LoginController@login')->name('login_post');
Route::get('seguridad/logout', 'seguridad\LoginController@logout')->name('logout');

Route::get('loginC', 'cliente\LoginClienteController@index')->name('loginC');
Route::post('cliente/login', 'cliente\LoginClienteController@login')->name('loginC_post');
Route::get('cliente/logout', 'cliente\LoginClienteController@logout')->name('logout');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'superadmin']], function(){
    Route::get('admin', 'AdminController@index')->name('index');
    Route::get('producto', 'ProductosController@interfaceagregar' )->name('producto');
    Route::post('producto', 'ProductosController@agregarbd' )->name('producto');
    
    Route::get('categoria', 'CategoriasController@consultar')->name('categoria');
    Route::post('categoria', 'CategoriasController@consultar')->name('categoria');
    Route::get('categoriaA', 'CategoriasController@interfaceagregar')->name('agregarCategoria');
    Route::post('categoriaA', 'CategoriasController@agregarbd')->name('agregarCategoria');
    Route::get('categoriaM/{id}', 'CategoriasController@interfacemodificar')->name('editarCategoria');
    Route::patch('categoriaM/{id}', 'CategoriasController@modificarbd')->name('agregarModificacion');
    //Route::post('categoriaM/{id}/g', 'CategoriasController@modificarbd')->name('agregarModificacion');

    Route::get('transporteC', 'TransporteController@consultar')->name('transporteC');
    Route::post('transporteC', 'TransporteController@consultar')->name('transporteC');
    Route::get('transporte', 'TransporteController@interfaceagregar' )->name('transporte');
    Route::post('transporte', 'TransporteController@agregarbd' )->name('transporte');

});
