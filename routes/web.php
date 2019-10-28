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
Route::get('seguridad/logoutA', 'seguridad\LoginController@logoutA')->name('logoutA');

Route::get('cliente', 'cliente\LoginClienteController@index')->name('loginC');
Route::post('cliente/login', 'cliente\LoginClienteController@login')->name('loginC_post');
Route::get('cliente/logoutC', 'cliente\LoginClienteController@logoutC')->name('logoutC');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'superadmin']], function(){
    Route::get('admin', 'AdminController@index')->name('index');

    Route::get('producto', 'ProductosController@consultar' )->name('producto');
    Route::post('producto', 'ProductosController@consultar' )->name('producto');
    Route::get('productoA', 'ProductosController@interfaceagregar' )->name('agregarProducto');
    Route::post('productoA', 'ProductosController@agregarbd' )->name('agregarProducto');
    Route::get('productoM/{id}', 'ProductosController@interfaceeditar' )->name('editarProducto');
    Route::post('productoM/{id}', 'ProductosController@editarbd' )->name('editarProducto');
    Route::post('productoE','ProductosController@eliminar')->name('productoE');
    
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

    Route::get('ofertasDes', 'OfertasDescuentosController@consultar' )->name('ofertaDescuento');
    Route::post('ofertasDes', 'OfertasDescuentosController@consultar' )->name('ofertaDescuento');
    Route::get('ofertasDesA/{id}', 'OfertasDescuentosController@interfaceagregar' )->name('agregarOfertaDescuento');
    Route::post('ofertasDesA/{id}', 'OfertasDescuentosController@agregarbd' )->name('agregarOfertaDescuento');


});

Route::group(['prefix' => 'cliente', 'namespace' => 'Cliente', 'middleware' =>  ['auth', 'cliente']], function(){
    Route::get('cliente', 'ClienteController@index')->name('indexc');
});

/* Rustas de Usuario */
Route::get('usuarioC', 'cliente\UsuarioController@index')->name('registroC');
//Route::get('usarioC/crear', 'UsuarioController@crear')->name('crearC');
Route::post('usuarioC', 'cliente\UsuarioController@guardar' )->name('guardarC');
Route::get('usuarioC/{id}/editar', 'cliente\UsuarioController@actualizar')->name('editarC');
Route::delete('usuarioC/{id}','cliente\UsuarioController@eliminar')->name('eliminarC');