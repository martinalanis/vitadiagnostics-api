<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\EquipoMedico;
use App\Models\Modalidad;
use Illuminate\Http\Request;

class EquipoMedicoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return response()->json(EquipoMedico::with('cliente')->get(), 200);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $cliente = Cliente::find($request->cliente_id);
    $equipoMedico = new EquipoMedico($request->all());

    if ($cliente->equiposMedicos()->save($equipoMedico)) {
      return response()->json($this->messages['create.success'], 200);
    }
    return response()->json(['errors' => [$this->messages['create.fail']]], Response::HTTP_CONFLICT);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\EquipoMedico  $equipoMedico
   * @return \Illuminate\Http\Response
   */
  public function show(EquipoMedico $equipoMedico)
  {
    return response()->json($equipoMedico, 200);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\EquipoMedico  $equipoMedico
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, EquipoMedico $equipoMedico)
  {
    $equipoMedico->fill($request->all());
    if ($equipoMedico->save()) {
      return response()->json($this->messages['update.success'], 200);
    }
    return response()->json($this->messages['update.fail'], Response::HTTP_CONFLICT);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\EquipoMedico  $equipoMedico
   * @return \Illuminate\Http\Response
   */
  public function destroy(EquipoMedico $equipoMedico)
  {
    if ($equipoMedico->delete()) {
      return response()->json($this->messages['delete.success'], 200);
    }
    return response()->json($this->messages['delete.fail'], Response::HTTP_CONFLICT);
  }

  public function getModalidades()
  {
    return response()->json(Modalidad::all(), 200);
  }
}
