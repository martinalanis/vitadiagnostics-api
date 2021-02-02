<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\EquipoMedicoController;
use App\Http\Controllers\RefaccionController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//   return $request->user();
// });

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
  Route::post('login', [AuthController::class, 'login']);
  Route::post('logout', [AuthController::class, 'logout']);
  Route::post('refresh', [AuthController::class, 'refresh']);
  Route::get('me', [AuthController::class, 'me']);
  Route::post('admin-confirm', [AuthController::class, 'adminVerify']);
});

Route::group(['middleware' => 'auth:api'], function () {
  Route::apiResource('users', UserController::class);
  Route::get('/clientes/list', [ClienteController::class, 'clientList']);
  Route::apiResource('clientes', ClienteController::class);
  Route::apiResource('refacciones', RefaccionController::class )
    ->parameter('refacciones', 'refaccion');
  Route::apiResource('roles', RolController::class )
    ->parameter('roles', 'rol');
  Route::get('/equipos-medicos/modalidades', [EquipoMedicoController::class, 'getModalidades']);
  Route::apiResource('equipos-medicos', EquipoMedicoController::class)
    ->parameter('equipos-medicos', 'equipoMedico');
  Route::post('change-password/{user}', [AuthController::class, 'changePassword']);
  Route::apiResource('cotizaciones', CotizacionController::class)
    ->parameter('cotizaciones', 'cotizacion');
});

Route::fallback(function () {
  return response()->json([
    'message' => 'Recurso no encontrado'
  ], 404);
});
