<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:api', ['except' => ['login']]);
  }

  public function login(Request $request)
  {
    if (!$token = auth()->attempt($request->only('email', 'password'))) {
      return response(['message' => 'Usuario o contraseña incorrecta'], Response::HTTP_UNAUTHORIZED);
    }
    return response()->json(compact('token'));
  }

  public function logout()
  {
    auth()->logout();
    if (!auth()->check()) {
      return response()->json('Sesión cerrada correctamente', 200);
    }
    return response()->json(['message' => 'No se pudo cerrar la sesión'], Response::HTTP_CONFLICT);
  }

  public function me()
  {
    return response()->json(auth()->user());
  }

  public function refresh()
  {
    return $this->respondWithToken(auth()->refresh());
  }

  public function adminVerify(Request $request)
  {
    /**
     * Validar via token que la contraseña sea valida para el usuario que envia la peticion
     */
    // $valid = auth()->user()->password;
    $valid = Hash::check($request->password, auth()->user()->password);
    if ($valid) {
      return response()->json(['success' => true], 200);
    }
    return response()->json(['message' => 'Contraseña incorrecta'], Response::HTTP_FORBIDDEN);
  }

  public function changePassword(Request $request, User $user)
  {
    $user->password = $request->password;
    if ($user->save()) {
      return response()->json('La contraseña se actualizo correctamente', 200);
    }
    return response()->json(['message' => 'No se pudo actualizar la contraseña'], Response::HTTP_CONFLICT);
  }

  protected function respondWithToken($token)
  {
    return response()->json([
      'access_token' => $token,
      'token_type' => 'bearer',
      'expires_in' => auth()->factory()->getTTL() * 60
    ]);
  }
}
