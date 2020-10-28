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
    'tipo',
    'fecha',
    'status',
  ];
}
