<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refaccion extends Model
{
  use HasFactory;

  protected $table = 'refacciones';

  protected $fillable = [
    'nombre',
    'num_parte',
    'modalidad_id',
  ];

  protected $with = ['modalidad'];

  public function modalidad()
  {
    return $this->belongsTo('\App\Models\Modalidad');
  }
}
