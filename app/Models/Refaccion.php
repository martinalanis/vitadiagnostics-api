<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refaccion extends Model
{
    use HasFactory;

    protected $table = 'Refacciones';

    protected $fillable = [
      'nombre',
      'modelo',
      'serie',
    ];

}
