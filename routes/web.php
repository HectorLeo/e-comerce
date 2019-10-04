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

<<<<<<< HEAD
Route :: get ('/',function(){
    return view('seguridad.login');
});

Route::post('login', 'Auth\LoginController@login')->name('login');

//Route::get('/login', 'seguridad\LoginController@login')->name('login');
//Route::post('login', 'seguridad\LoginController@login')->name('login');
//Route::get('/producto', 'Admin\ProductosController@agregar' )->name('producto');
//Route::group(['prefix' => 'admin', 'namespace' => 'Admin' ], function(){
//    Route::get('', 'AdminController@index');
//});


/*Route::get('/login', function () {
    return view('login');
});*/
=======


Route::get('/index', 'PaginasController@contenido' )->name('index');

Route::get('/producto', 'Admin\ProductosController@interfaceagregar' )->name('producto');

Route::post('producto', 'Admin\ProductosController@agregarbd' )->name('producto');

>>>>>>> 1f559e25f7b6e63b4766374f44754bba23c2e5db
