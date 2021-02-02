<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use Illuminate\Http\Request;

class CotizacionController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return response()->json(Cotizacion::all(), 200);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Cotizacion  $cotizacion
   * @return \Illuminate\Http\Response
   */
  public function show(Cotizacion $cotizacion)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Cotizacion  $cotizacion
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Cotizacion $cotizacion)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Cotizacion  $cotizacion
   * @return \Illuminate\Http\Response
   */
  public function destroy(Cotizacion $cotizacion)
  {
    //
  }
}
