<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipoMedico extends Model
{
  use HasFactory;

  protected $table = 'equipos_medicos';

  protected $fillable = [
    'cliente_id',
    'nombre',
    'modelo',
    'serie',
    'fabricante',
    'modalidad_id',
  ];

  protected $with = ['modalidad'];

  public function cliente()
  {
    return $this->belongsTo('\App\Models\Cliente');
  }

  public function modalidad()
  {
    return $this->belongsTo('\App\Models\Modalidad');
  }
}
