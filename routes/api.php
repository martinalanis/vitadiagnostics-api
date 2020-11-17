<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RefaccionController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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
  Route::apiResource('refacciones', RefaccionController::class )
    ->parameter('refacciones', 'refaccion');
  Route::apiResource('roles', RolController::class )
    ->parameter('roles', 'rol');
  Route::post('change-password/{user}', [AuthController::class, 'changePassword']);
});
