<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionTipo extends Model
{
  use HasFactory;

  protected $table = 'cotizacion_tipo';

  protected $fillable = [
    'nombre',
    'tag',
  ];

  public function cotizaciones()
  {
      return $this->hasMany('App\Models\Cotizacion');
  }
}
