<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
      'nombre',
      'razon_social',
      'email',
      'telefonos',
      'rfc',
      'direccion',
      'cp',
      'estado',
      'municipio'
    ];

    // protected $with = ['equiposMedicos'];

    public function equiposMedicos()
    {
      return $this->hasMany('\App\Models\EquipoMedico');
    }
}
