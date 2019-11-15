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
    Route::get('producto-insertar', 'ProductosController@interfaceagregar' )->name('agregarProducto');
    Route::post('producto-insertar', 'ProductosController@agregarbd' )->name('agregarProducto');
    Route::get('producto-Modificar/{id}', 'ProductosController@interfaceeditar' )->name('editarProducto');
    Route::post('producto-Modificar/{id}', 'ProductosController@editarbd' )->name('editarProducto');
    Route::post('productoE','ProductosController@eliminar')->name('productoE');
    Route::post('productoImagen','ProductosController@eliminarimagen')->name('productoImagen');
    
    Route::get('categoria', 'CategoriasController@consultar')->name('categoria');
    Route::post('categoria', 'CategoriasController@consultar')->name('categoria');
    Route::get('categoria-insertar', 'CategoriasController@interfaceagregar')->name('agregarCategoria');
    Route::post('categoria-insertar', 'CategoriasController@agregarbd')->name('agregarCategoria');
    Route::get('categoria-Modificar/{id}', 'CategoriasController@interfacemodificar')->name('editarCategoria');
    Route::patch('categoria-Modificar/{id}', 'CategoriasController@modificarbd')->name('agregarModificacion');
    Route::post('categoriaE','CategoriasController@eliminar')->name('categoriaE');
    
    //Route::post('categoriaM/{id}/g', 'CategoriasController@modificarbd')->name('agregarModificacion');

    Route::get('transporteC', 'TransporteController@consultar')->name('transporteC');
    Route::post('transporteC', 'TransporteController@consultar')->name('transporteC');
    Route::get('transporte-insertar', 'TransporteController@interfaceagregar' )->name('transporte');
    Route::post('transporte-insertar', 'TransporteController@agregarbd' )->name('transporte');
    Route::get('transporte-Modificar/{id}', 'TransporteController@interfacemodificar')->name('editarTransporte');
    Route::patch('transporte-Modificar/{id}', 'TransporteController@modificarbd')->name('agregarModificacionT');
    Route::post('transporteE','TransporteController@eliminar')->name('transporteE');

    Route::get('marcaC', 'MarcaController@consultar')->name('marcaC');
    Route::post('marcaC', 'MarcaController@consultar')->name('marcaC');
    Route::get('marca-insertar', 'MarcaController@interfaceagregar' )->name('Marca');
    Route::post('marca-insertar', 'MarcaController@agregarbd' )->name('Marca');
    Route::get('marca-Modificar/{id}', 'MarcaController@interfacemodificar')->name('editarMarca');
    Route::patch('marca-Modificar/{id}', 'MarcaController@modificarbd')->name('agregarModificacionM');
    Route::post('marcaE','MarcaController@eliminar')->name('marcaE');

    Route::get('ofertasDes', 'OfertasDescuentosController@consultar' )->name('ofertaDescuento');
    Route::post('ofertasDes', 'OfertasDescuentosController@consultar' )->name('ofertaDescuento');
    Route::get('ofertasDes-insertar/{id}', 'OfertasDescuentosController@interfaceagregar' )->name('agregarOfertaDescuento');
    Route::post('ofertasDes-insertar/{id}', 'OfertasDescuentosController@agregarbd' )->name('agregarOfertaDescuento');
    Route::get('ofertasDes-Modificar/{id}', 'OfertasDescuentosController@interfacemodificar')->name('editarOfertaDescuento');
    Route::post('ofertasDes-Modificar/{id}', 'OfertasDescuentosController@editarbd')->name('editarOfertaDescuento');
    Route::post('ofertasDesE','OfertasDescuentosController@eliminar')->name('ofertasDesE');

    Route::get('comentarios', 'ComentariosController@consultar' )->name('ComentarioCliente');
    Route::post('comentariosE','ComentariosController@eliminar')->name('comentariosE');

});

Route::group(['prefix' => 'cliente', 'namespace' => 'Cliente', 'middleware' =>  ['auth', 'cliente']], function(){
    Route::get('cliente', 'ClienteController@index')->name('indexc');
    Route::get('tiendaCliente/{id}', 'UsuClienteController@tiendaC')->name('tCliente');
    Route::get('cliente', 'UsuClienteController@contenido' )->name('homeCliente'); 
    Route::get('clienteP/{id}', 'UsuClienteController@TiendaP' )->name('clienteP');
});

/* Rustas de Usuario */
Route::get('usuarioC', 'cliente\UsuarioController@index')->name('registroC');
//Route::get('usarioC/crear', 'UsuarioController@crear')->name('crearC');
Route::post('usuarioC', 'cliente\UsuarioController@guardar' )->name('guardarC');
Route::get('usuarioC/{id}/editar', 'cliente\UsuarioController@actualizar')->name('editarC');
Route::delete('usuarioC/{id}','cliente\UsuarioController@eliminar')->name('eliminarC');

Route::get('tiendaC/{id}', 'PaginasController@tiendaC')->name('tiendaC');
Route::get('tiendaP/{id,email}', 'PaginasController@TiendaP')->name('TiendaP');

Route::get('carrito', 'cliente\CartController@show')->name('carrito');
Route::bind('producto', function($slug){
    return App\Models\Admin\Producto::where('nombre_p',$slug)->first();
});
Route::get('add/{producto}','cliente\CartController@add')->name('add');
Route::get('delete/{producto}','cliente\CartController@delete')->name('delete'); 
Route::get('updateS/{producto}/{quantity?}','cliente\CartController@update')->name('updateS'); 
Route::post('update','cliente\CartController@update')->name('update');  
