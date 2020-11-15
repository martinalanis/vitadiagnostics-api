<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:api', ['except' => ['login', 'adminVerify']]);
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
    return response()->json(['message' => 'Successfully logged out']);
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
    if (true) {
      return response()->json(['success' => true], 200);
    }
    return response()->json(['message' => 'Contraseña incorrecta'], Response::HTTP_FORBIDDEN);
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
