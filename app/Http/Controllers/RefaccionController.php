<?php

namespace App\Http\Controllers;

use App\Models\Refaccion;
use Illuminate\Http\Request;

class RefaccionController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return response()->json(Refaccion::all(), 200);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $refaccion = new Refaccion($request->all());

    if ($refaccion->save()) {
      return response()->json($this->messages['create.success'], 200);
    }
    return response()->json(['errors' => [$this->messages['create.fail']]], Response::HTTP_CONFLICT);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Refaccion  $refaccion
   * @return \Illuminate\Http\Response
   */
  public function show(Refaccion $refaccion)
  {
    return response()->json($refaccion, 200);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Refaccion  $refaccion
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Refaccion $refaccion)
  {
    $refaccion->fill($request->all());
    if ($refaccion->save()) {
      return response()->json($this->messages['update.success'], 200);
    }
    return response()->json($this->messages['update.fail'], Response::HTTP_CONFLICT);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Refaccion  $refaccion
   * @return \Illuminate\Http\Response
   */
  public function destroy(Refaccion $refaccion)
  {
    if ($refaccion->delete()) {
      return response()->json($this->messages['delete.success'], 200);
    }
    return response()->json($this->messages['delete.fail'], Response::HTTP_CONFLICT);
  }
}
