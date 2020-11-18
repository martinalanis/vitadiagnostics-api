<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClienteController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return response()->json(Cliente::all(), 200);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // $this->validate($request, [
    //   'email' => 'required|email|unique:App\Models\Cliente',
    // ], [
    //   'email.unique' => 'Esta cuenta de correo ya existe, intenta con una diferente',
    //   'email.email' => 'Formato de email no válido',
    // ]);

    $cliente = new Cliente($request->all());

    if ($cliente->save()) {
      return response()->json($this->messages['create.success'], 200);
    }
    return response()->json(['errors' => [$this->messages['create.fail']]], Response::HTTP_CONFLICT);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Cliente  $cliente
   * @return \Illuminate\Http\Response
   */
  public function show(Cliente $cliente)
  {
    return response()->json($cliente, 200);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Cliente  $cliente
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Cliente $cliente)
  {
    $cliente->fill($request->all());
    if ($cliente->save()) {
      return response()->json($this->messages['update.success'], 200);
    }
    return response()->json($this->messages['update.fail'], Response::HTTP_CONFLICT);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Cliente  $cliente
   * @return \Illuminate\Http\Response
   */
  public function destroy(Cliente $cliente)
  {
    if ($cliente->delete()) {
      return response()->json($this->messages['delete.success'], 200);
    }
    return response()->json($this->messages['delete.fail'], Response::HTTP_CONFLICT);
  }
}
