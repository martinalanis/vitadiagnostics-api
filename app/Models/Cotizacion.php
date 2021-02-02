<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
  use HasFactory;

  protected $table = 'cotizaciones';

  protected $fillable = [
    'cliente_id',
    'user_id',
    'tipo_id',
    'fecha',
    'status',
  ];

  protected $with = ['tipo', 'cliente', 'user'];

  public function tipo()
  {
      return $this->belongsTo('App\Models\CotizacionTipo', 'tipo_id');
  }

  public function cliente()
  {
      return $this->belongsTo('App\Models\Cliente');
  }

  public function user()
  {
      return $this->belongsTo('App\Models\User');
  }
}
