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

//Route::get('/login', 'seguridad\LoginController@login')->name('login');
Route::post('login', 'seguridad\LoginController@login')->name('login');
Route::get('/producto', 'Admin\ProductosController@agregar' )->name('producto');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin' ], function(){
    Route::get('', 'AdminController@index');
});


/*Route::get('/login', function () {
    return view('login');
});*/
