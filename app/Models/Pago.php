<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
  use HasFactory;

  protected $fillable = [
    'cotizacion_id',
    'fecha',
    'total',
    'file_url',
  ];
}
