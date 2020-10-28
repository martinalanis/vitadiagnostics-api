<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HojaDeServicio extends Model
{
  use HasFactory;

  protected $table = 'hojas_de_servcio';

  protected $fillable = [
    'reporte_id',
    'user_id',
    'fecha',
    'inicio',
    'fin',
    'diagnostico',
    'acciones_tomadas',
    'pruebas_realizadas',
    'estatus_final',
  ];
}
