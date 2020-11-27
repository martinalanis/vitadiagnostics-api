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
    //
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
    //
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
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\EquipoMedico  $equipoMedico
   * @return \Illuminate\Http\Response
   */
  public function destroy(EquipoMedico $equipoMedico)
  {
    //
  }

  public function getModalidades()
  {
    return response()->json(Modalidad::all(), 200);
  }
}
