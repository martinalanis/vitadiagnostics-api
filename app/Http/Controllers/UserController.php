<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return response()->json(User::with('rol')->get(), 200);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'email' => 'required|email|unique:App\Models\User',
    ], [
      'email.unique' => 'Esta cuenta de correo ya existe, intenta con una diferente',
      'email.email' => 'Formato de email no válido',
    ]);

    $user = new User($request->all());

    if ($user->save()) {
      return response()->json($this->messages['create.success'], 200);
    }
    return response()->json(['errors' => [$this->messages['create.fail']]], Response::HTTP_CONFLICT);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function show(User $user)
  {
    return response()->json($user, 200);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, User $user)
  {
    // $validator = Validator::make($request->all(), [
    //   'name' => 'required',
    //   'email' => [
    //     'required',
    //     Rule::unique('users')->ignore($user->id),
    //   ],
    //   'type' => 'required'
    // ], [
    //   'email.unique' => 'Esta cuenta de correo ya existe, intenta con una diferente',
    //   'name.required' => 'El nombre es requerido',
    //   'email.required' => 'El email es requerido',
    //   'type.required' => 'El tipo de usuario es requerido'
    // ]);
    $user->fill($request->all());
    if ($user->save()) {
      return response()->json($this->messages['update.success'], 200);
    }
    return response()->json($this->messages['update.fail'], Response::HTTP_CONFLICT);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $user)
  {
    if ($user->delete()) {
      return response()->json($this->messages['delete.success'], 200);
    }
    return response()->json($this->messages['delete.fail'], Response::HTTP_CONFLICT);
  }
}
