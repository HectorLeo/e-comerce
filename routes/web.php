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

    Route::get('producto', 'ProductosController@consultar' )->name('producto');
    Route::post('producto', 'ProductosController@consultar' )->name('producto');
    Route::get('productoA', 'ProductosController@interfaceagregar' )->name('agregarProducto');
    Route::post('productoA', 'ProductosController@agregarbd' )->name('agregarProducto');
    Route::get('productoM/{id}', 'ProductosController@interfaceeditar' )->name('editarProducto');
    Route::post('productoM/{id}', 'ProductosController@editarbd' )->name('editarProducto');
    
    Route::get('categoria', 'CategoriasController@consultar')->name('categoria');
    Route::post('categoria', 'CategoriasController@consultar')->name('categoria');
    Route::get('categoriaA', 'CategoriasController@interfaceagregar')->name('agregarCategoria');
    Route::post('categoriaA', 'CategoriasController@agregarbd')->name('agregarCategoria');
    Route::get('categoriaM/{id}', 'CategoriasController@interfacemodificar')->name('editarCategoria');
    Route::patch('categoriaM/{id}', 'CategoriasController@modificarbd')->name('agregarModificacion');
    Route::post('categoriaE','CategoriasController@eliminar')->name('categoriaE');
    
    //Route::post('categoriaM/{id}/g', 'CategoriasController@modificarbd')->name('agregarModificacion');

    Route::get('transporteC', 'TransporteController@consultar')->name('transporteC');
    Route::post('transporteC', 'TransporteController@consultar')->name('transporteC');
    Route::get('transporte', 'TransporteController@interfaceagregar' )->name('transporte');
    Route::post('transporte', 'TransporteController@agregarbd' )->name('transporte');
    Route::get('transporteM/{id}', 'TransporteController@interfacemodificar')->name('editarTransporte');
    Route::patch('transporteM/{id}', 'TransporteController@modificarbd')->name('agregarModificacionT');
    Route::post('transporteE','TransporteController@eliminar')->name('transporteE');

    Route::get('marcaC', 'MarcaController@consultar')->name('marcaC');
    Route::post('marcaC', 'MarcaController@consultar')->name('marcaC');
    Route::get('marca', 'MarcaController@interfaceagregar' )->name('Marca');
    Route::post('marca', 'MarcaController@agregarbd' )->name('Marca');
    Route::get('marcaM/{id}', 'MarcaController@interfacemodificar')->name('editarMarca');
    Route::patch('marcaM/{id}', 'MarcaController@modificarbd')->name('agregarModificacionM');
    Route::post('marcaE','MarcaController@eliminar')->name('marcaE');

});
