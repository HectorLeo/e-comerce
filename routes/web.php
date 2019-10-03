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

//Route::get('/index', 'PaginasController@contenido' );
//Route::get('/login', 'seguridad\LoginController@index')->name('login');
//Route::post('/login', 'seguridad\LoginController@index')->name('login_post');

Route::get('/index', 'PaginasController@contenido' )->name('index');

Route::get('/producto', 'Admin\ProductosController@interfaceagregar' )->name('producto');

Route::post('producto', 'Admin\ProductosController@agregarbd' )->name('producto');

/*Route::get('/login', 'seguridad\LoginController@index')->name('login');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth' ], function(){
    Route::get('', 'AdminController@index');
});


/*Route::get('/login', function () {
    return view('login');
});*/
