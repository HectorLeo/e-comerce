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
Route::get('/', 'seguridad\LoginController@index')->name('login');
Route::post('seguridad/login', 'seguridad\LoginController@login')->name('login_post');
Route::get('seguridad/logout', 'seguridad\LoginController@logout')->name('logout');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function(){
    Route::get('', 'AdminController@index')->name('index');
    Route::get('/producto', 'ProductosController@agregar' )->name('producto');
<<<<<<< HEAD
});
=======
});

Route::get('/index', 'PaginasController@contenido' )->name('index');

Route::get('/producto', 'Admin\ProductosController@interfaceagregar' )->name('producto');
Route::post('producto', 'Admin\ProductosController@agregarbd' )->name('producto');

Route::get('/categoria', 'Admin\CategoriasController@interfaceagregar')->name('categoria');
Route::post('categoria', 'Admin\CategoriasController@agregarbd')->name('categoria');
/** */

>>>>>>> e6152b36c38089d8ac212f7bee7939f992d694ed
