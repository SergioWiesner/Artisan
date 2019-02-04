<?php
/** RUTAS DE LA PAGINA **/
Route::middleware([])->group(function () {
    Route::get('/', 'AppController@home');
    Route::get('/productos/', 'AppController@productos')->name('productos');
    Route::get('/productos/propiedades/', 'AppController@propiedades')->name('propiedades');
    Route::get('/usuarios/', 'AppController@usuarios')->name('listarusuarios');

    Route::get('/usuarios/{id?}/', 'AppController@verUsuarios')->name('detallesusuarios');

    Route::get('/configuracion/', 'AppController@configuracion')->name('configuracion');
    /** RUTAS DE LA PAGINA **/
    Auth::routes();
});

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

/** RUTAS DE PRODUCTOS Y PROPIEDADES **/
/** RUTAS DE PROPIEDADES PARA LOS PRODUCTOS **/
Route::middleware(['auth'])->group(function () {
    Route::get('/productos/propiedades/eliminar/{id}', 'PropiedadesController@delete')->name('eliminarpropiedad');
    Route::get('/productos/propiedades/toogle/{id}/{estado}', 'PropiedadesController@toogle')->name('tooglepropiedad');
    Route::post('/productos/propiedades/agregar', 'PropiedadesController@store')->name('agregarpropiedad');
    Route::put('/productos/propiedades/editar/{id}', 'PropiedadesController@update')->name('editarpropiedad');
});
/** RUTAS DE PROPIEDADES PARA LOS PRODUCTOS **/

/** RUTA DE CATEGORIA DE PRODUCTOS **/
Route::middleware(['auth'])->group(function () {
    Route::post('/productos/agregar/categoria', 'CategoriaProductosController@store')->name('agregarcategoria');
    Route::patch('/productos/actualizar/categoria/{id}', 'CategoriaProductosController@update')->name('actualizarcategoria');
    Route::get('/productos/eliminar/categoria/{id}', 'CategoriaProductosController@delete')->name('eliminarcategoria');
    //   Route::put('/productos/propiedades/editar/{id}', 'PropiedadesController@update')->name('editarpropiedad');
});
/** RUTA DE CATEGORIA DE PRODUCTOS **/

/** RUTA DE PRODUCTOS **/
Route::middleware(['auth'])->group(function () {
    Route::post('/productos/agregar', 'ProductosController@store')->name('agregarproducto');
    Route::patch('/productos/editar/{id}', 'ProductosController@update')->name('editarproducto');
    Route::get('/productos/eliminar/{id}', 'ProductosController@delete')->name('eliminarproducto');
    Route::get('/productos/ver/{id}', 'AppController@verproductodetalles')->name('verproducto');

});
/** RUTA DE PRODUCTOS **/
/** RUTAS DE PRODUCTOS Y PROPIEDADES **/

/** RUTAS DE USUARIOS **/
Route::get('/usuarios/eliminar/{id}', 'UsuariosController@destroy')->name('usuarioeliminar');
Route::post('/usuarios/crear/', 'UsuariosController@store')->name('usuarioscrear');
Route::patch('/usuarios/editar/{id}', 'UsuariosController@update')->name('usuarioeditar');
/** RUTAS DE USUARIOS **/

/** RUTAS DE BODEGAS **/
Route::post('/bodega/crear/', 'BodegasController@store')->name('bodegacrear');
/** RUTAS DE BODEGAS **/
