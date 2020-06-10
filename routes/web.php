<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|504954
*/

Route::get('/', function () {
    return view('auth/login');
});


Route::get('imprimirVehiculos','PdfController@imprimirVehiculos')->name('imprimirVehiculos');
Route::get('imprimirVehiculoUnico/{id}','PdfController@imprimirVehiculoUnico')->name('imprimirVehiculoUnico');
Route::get('imprimirTipoVehiculos','PdfController@imprimirTipoVehiculos')->name('imprimirTipoVehiculos');
Route::get('imprimirTipoVehiculoUnico/{id}','PdfController@imprimirTipoVehiculoUnico')->name('imprimirTipoVehiculoUnico');
Route::get('imprimirTarifas','PdfController@imprimirTarifas')->name('imprimirTarifas');
Route::get('imprimirIngresos','PdfController@imprimirIngresos')->name('imprimirIngresos');
Route::get('imprimirSalidas','PdfController@imprimirSalidas')->name('imprimirSalidas');



Route::get('ticket/{placa}/{id}/{valor}', 'TicketController@generarTicket')->name('ticket');

Route::resource('ticket', 'TicketController');
Route::resource('ingresoV', 'Ingreso_vehiculoController');
Route::resource('vehiculo', 'VehiculoController');
Route::resource('empleado', 'EmpleadoController');
Route::resource('tarifa', 'TarifaController');
Route::resource('tipovehiculo', 'TipoVehiculoController');


Route::get('chat', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');

Route::get('jquery', function () {
    return view('Practicasjq/index');
});

Route::get('jquery2', function () {
    return view('Practicasjq/index2');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
