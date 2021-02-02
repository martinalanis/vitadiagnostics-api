<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
  use HasFactory;

  protected $table = 'modalidades';

  protected $fillable = [
    'nombre',
    'tag',
  ];

  public function eqiposMedicos()
  {
    return $this->hasMany('\App\Models\EquipoMedico');
  }

  public function refacciones()
  {
    return $this->hasMany('\App\Models\Refaccion');
  }
}
