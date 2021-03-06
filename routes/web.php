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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'EcommerceController@index')->name('inicio');
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('get_producto_by_id', 'EcommerceController@get_producto_by_id');
Route::get('productos/{id}', 'EcommerceController@verProducto');

Route::get('c/{slug}', 'EcommerceController@listarPorCategoria');
Route::get('s', 'EcommerceController@buscarProducto');
Route::get('ccomerciales', 'EcommerceController@listarGalerias');
Route::get('ccomerciales/{slug}', 'EcommerceController@filtrarTiendas');
Route::get('restaurantes', 'EcommerceController@listarTiendas');
Route::get('r/{slug}', 'EcommerceController@listarTiendaProducto');
Route::get('qr/{qr}', 'EcommerceController@lectorqr');
Route::get('catemenu/{id}', 'EcommerceController@listarCategProducto_rest');
Route::get('getcategoria', 'EcommerceController@getCategoria_rest');
Route::get('getbuscador', 'EcommerceController@getBuscador_rest');
Route::get('getFilterPrice', 'EcommerceController@getFilterPrice_rest');
Route::get('get_productos_by_oferta', 'EcommerceController@get_productos_by_oferta');


// PEDIDO
Route::post('pedido', 'PedidoController@enviar');

// FERIA
Route::get('feria', 'FeriaController@index')->name('feria');
Route::get('feriadigital', 'FeriaController@isometrica')->name('isometrica');
Route::get('feria/stand', 'FeriaController@stand')->name('stand');

Route::get('get_horarios', 'HorarioController@get_horarios');
Route::get('get_deliveries', 'DeliveryController@get_deliveries');

// Route::get('/productos', function () {
//     return view('frontend.detalleproducto');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('pedidos', 'PedidoController@pedidos')->middleware('role:Delivery|DeliveryRestaurante');
    Route::get('get_pedidos', 'PedidoController@get_pedidos')->middleware('role:Delivery|DeliveryRestaurante');
    Route::get('get_restaurante', 'PedidoController@get_restaurante')->middleware('role:Delivery|DeliveryRestaurante');
    Route::get('get_productos', 'PedidoController@get_productos')->middleware('role:Delivery|Tienda|DeliveryRestaurante');
    Route::get('enviar_delivery', 'PedidoController@enviar_delivery')->middleware('role:Delivery|DeliveryRestaurante');

    Route::get('restaurante/delivery-show', 'DeliveryController@show_restaurante')->middleware('role:Tienda')->name('restaurante.delivery-show');
    Route::get('restaurante/delivery', 'DeliveryController@crear_restaurante')->middleware('role:Tienda');
    Route::post('restaurante/restaurante_store', 'DeliveryController@restaurante_store')->middleware('role:Tienda')->name('delivery.restaurante_store');
    Route::delete('restaurante/delivery/{id}', "DeliveryController@destroy")->middleware('role:Tienda')->name("restDelivery.destroy");

    Route::get('pedidosTienda', 'PedidoController@tienda')->middleware('role:Tienda');
    Route::get('get_pedidos_restaurante', 'PedidoController@get_pedidos_restaurante')->middleware('role:Tienda');

    //horaios
    Route::get('horarios/show/{id}', 'HorarioController@show')->middleware('role:Tienda|Admin')->name('horarios.show');
    Route::post('horarios/store', 'HorarioController@store')->middleware('role:Tienda|Admin')->name('horarios.store');

    Route::get('users_impersonate', 'PersonaController@indexusers')->name('users.users_impersonate')->middleware('role:Admin');
    //impersonate
	Route::get('impersonate/{user_id}', 'PersonaController@impersonate')->name('users.impersonate')->middleware('role:Admin');
	Route::get('impersonate_leave', 'PersonaController@impersonate_leave')->name('users.impersonate_leave');

    Route::get('/home', 'HomeController@index')->name('home');
    // Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::resource('/admin/personal', 'PersonaController')->middleware('role:Admin');
    Route::get('mitienda', 'TiendaController@editmitienda')->middleware('role:Admin|Tienda');
    Route::PUT('mitienda/{id}', 'TiendaController@updatemitienda')->middleware('role:Admin|Tienda');

    Route::resource('galerias', 'GaleriaController')->middleware('role:Admin');
    Route::resource('tiendas', 'TiendaController')->middleware('role:Admin');
    Route::resource('delivery', 'DeliveryController')->middleware('role:Admin');
    Route::resource('products', 'ProductoController')->middleware('role:Admin|Tienda');
    Route::resource('categorias', 'CategoriaController')->middleware('role:Admin|Tienda');
    Route::post('categoria/update-order','CategoriaController@updateOrder')->middleware('role:Admin|Tienda');

});
