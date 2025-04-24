<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rutas de usuarios
Route::prefix('usuarios')->group(function () {
    Route::get('/', 'UsuarioController@index');
    Route::post('/', 'UsuarioController@store');
    Route::get('/{id}', 'UsuarioController@show');
    Route::put('/{id}', 'UsuarioController@update');
    Route::delete('/{id}', 'UsuarioController@destroy');
});

// Rutas de perfiles
Route::prefix('perfiles')->group(function () {
    Route::get('/', 'PerfilController@index');
    Route::post('/', 'PerfilController@store');
    Route::get('/{id}', 'PerfilController@show');
    Route::put('/{id}', 'PerfilController@update');
    Route::delete('/{id}', 'PerfilController@destroy');
});

// Rutas de medidas corporales
Route::prefix('medidas')->group(function () {
    Route::get('/', 'MedidaCorporalController@index');
    Route::post('/', 'MedidaCorporalController@store');
    Route::get('/{id}', 'MedidaCorporalController@show');
    Route::put('/{id}', 'MedidaCorporalController@update');
    Route::delete('/{id}', 'MedidaCorporalController@destroy');
    Route::get('/usuario/{usuario_id}', 'MedidaCorporalController@getByUsuario');
});

// Rutas de fotos de progreso
Route::prefix('fotos-progreso')->group(function () {
    Route::get('/', 'FotoProgresoController@index');
    Route::post('/', 'FotoProgresoController@store');
    Route::get('/{id}', 'FotoProgresoController@show');
    Route::delete('/{id}', 'FotoProgresoController@destroy');
    Route::get('/usuario/{usuario_id}', 'FotoProgresoController@getByUsuario');
});

// Rutas de alimentos
Route::prefix('alimentos')->group(function () {
    Route::get('/', 'AlimentoController@index');
    Route::post('/', 'AlimentoController@store');
    Route::get('/{id}', 'AlimentoController@show');
    Route::put('/{id}', 'AlimentoController@update');
    Route::delete('/{id}', 'AlimentoController@destroy');
});

// Rutas de planes alimenticios
Route::prefix('planes-alimenticios')->group(function () {
    Route::get('/', 'PlanAlimenticioController@index');
    Route::post('/', 'PlanAlimenticioController@store');
    Route::get('/{id}', 'PlanAlimenticioController@show');
    Route::put('/{id}', 'PlanAlimenticioController@update');
    Route::delete('/{id}', 'PlanAlimenticioController@destroy');
    Route::get('/usuario/{usuario_id}', 'PlanAlimenticioController@getByUsuario');
});

// Rutas de comidas
Route::prefix('comidas')->group(function () {
    Route::get('/', 'ComidaController@index');
    Route::post('/', 'ComidaController@store');
    Route::get('/{id}', 'ComidaController@show');
    Route::put('/{id}', 'ComidaController@update');
    Route::delete('/{id}', 'ComidaController@destroy');
});

// Rutas de ejercicios
Route::prefix('ejercicios')->group(function () {
    Route::get('/', 'EjercicioController@index');
    Route::post('/', 'EjercicioController@store');
    Route::get('/{id}', 'EjercicioController@show');
    Route::put('/{id}', 'EjercicioController@update');
    Route::delete('/{id}', 'EjercicioController@destroy');
    Route::get('/categoria/{categoria}', 'EjercicioController@getByCategoria');
});

// Rutas de rutinas
Route::prefix('rutinas')->group(function () {
    Route::get('/', 'RutinaController@index');
    Route::post('/', 'RutinaController@store');
    Route::get('/{id}', 'RutinaController@show');
    Route::put('/{id}', 'RutinaController@update');
    Route::delete('/{id}', 'RutinaController@destroy');
    Route::get('/usuario/{usuario_id}', 'RutinaController@getByUsuario');
});

// Rutas de registros de entrenamiento
Route::prefix('registros-entrenamiento')->group(function () {
    Route::get('/', 'RegistroEntrenamientoController@index');
    Route::post('/', 'RegistroEntrenamientoController@store');
    Route::get('/{id}', 'RegistroEntrenamientoController@show');
    Route::put('/{id}', 'RegistroEntrenamientoController@update');
    Route::delete('/{id}', 'RegistroEntrenamientoController@destroy');
    Route::get('/usuario/{usuario_id}', 'RegistroEntrenamientoController@getByUsuario');
});

// Rutas de membresías
Route::prefix('membresias')->group(function () {
    Route::get('/', 'MembresiaController@index');
    Route::post('/', 'MembresiaController@store');
    Route::get('/{id}', 'MembresiaController@show');
    Route::put('/{id}', 'MembresiaController@update');
    Route::delete('/{id}', 'MembresiaController@destroy');
});

// Rutas de suscripciones
Route::prefix('suscripciones')->group(function () {
    Route::get('/', 'SuscripcionController@index');
    Route::post('/', 'SuscripcionController@store');
    Route::get('/{id}', 'SuscripcionController@show');
    Route::put('/{id}', 'SuscripcionController@update');
    Route::delete('/{id}', 'SuscripcionController@destroy');
    Route::get('/usuario/{usuario_id}', 'SuscripcionController@getByUsuario');
});

// Rutas de pagos
Route::prefix('pagos')->group(function () {
    Route::get('/', 'PagoController@index');
    Route::post('/', 'PagoController@store');
    Route::get('/{id}', 'PagoController@show');
    Route::put('/{id}', 'PagoController@update');
    Route::get('/suscripcion/{suscripcion_id}', 'PagoController@getBySuscripcion');
});

// Rutas de productos
Route::prefix('productos')->group(function () {
    Route::get('/', 'ProductoController@index');
    Route::post('/', 'ProductoController@store');
    Route::get('/{id}', 'ProductoController@show');
    Route::put('/{id}', 'ProductoController@update');
    Route::delete('/{id}', 'ProductoController@destroy');
    Route::get('/categoria/{categoria}', 'ProductoController@getByCategoria');
});

// Rutas de pedidos
Route::prefix('pedidos')->group(function () {
    Route::get('/', 'PedidoController@index');
    Route::post('/', 'PedidoController@store');
    Route::get('/{id}', 'PedidoController@show');
    Route::put('/{id}', 'PedidoController@update');
    Route::delete('/{id}', 'PedidoController@destroy');
    Route::get('/usuario/{usuario_id}', 'PedidoController@getByUsuario');
});

// Rutas de empleados
Route::prefix('empleados')->group(function () {
    Route::get('/', 'EmpleadoController@index');
    Route::post('/', 'EmpleadoController@store');
    Route::get('/{id}', 'EmpleadoController@show');
    Route::put('/{id}', 'EmpleadoController@update');
    Route::delete('/{id}', 'EmpleadoController@destroy');
    Route::get('/puesto/{puesto}', 'EmpleadoController@getByPuesto');
});

// Rutas de horarios de entrenadores
Route::prefix('horarios-entrenadores')->group(function () {
    Route::get('/', 'HorarioEntrenadorController@index');
    Route::post('/', 'HorarioEntrenadorController@store');
    Route::get('/{id}', 'HorarioEntrenadorController@show');
    Route::put('/{id}', 'HorarioEntrenadorController@update');
    Route::delete('/{id}', 'HorarioEntrenadorController@destroy');
    Route::get('/entrenador/{empleado_id}', 'HorarioEntrenadorController@getByEntrenador');
});

// Rutas de sesiones de entrenamiento
Route::prefix('sesiones')->group(function () {
    Route::get('/', 'SesionEntrenamientoController@index');
    Route::post('/', 'SesionEntrenamientoController@store');
    Route::get('/{id}', 'SesionEntrenamientoController@show');
    Route::put('/{id}', 'SesionEntrenamientoController@update');
    Route::delete('/{id}', 'SesionEntrenamientoController@destroy');
    Route::get('/usuario/{usuario_id}', 'SesionEntrenamientoController@getByUsuario');
    Route::get('/entrenador/{entrenador_id}', 'SesionEntrenamientoController@getByEntrenador');
});

// Rutas de retos
Route::prefix('retos')->group(function () {
    Route::get('/', 'RetoController@index');
    Route::post('/', 'RetoController@store');
    Route::get('/{id}', 'RetoController@show');
    Route::put('/{id}', 'RetoController@update');
    Route::delete('/{id}', 'RetoController@destroy');
    Route::get('/activos', 'RetoController@getActivos');
});

// Rutas de participaciones en retos
Route::prefix('participaciones-reto')->group(function () {
    Route::get('/', 'ParticipacionRetoController@index');
    Route::post('/', 'ParticipacionRetoController@store');
    Route::get('/{id}', 'ParticipacionRetoController@show');
    Route::put('/{id}', 'ParticipacionRetoController@update');
    Route::delete('/{id}', 'ParticipacionRetoController@destroy');
    Route::get('/usuario/{usuario_id}', 'ParticipacionRetoController@getByUsuario');
    Route::get('/reto/{reto_id}', 'ParticipacionRetoController@getByReto');
});
