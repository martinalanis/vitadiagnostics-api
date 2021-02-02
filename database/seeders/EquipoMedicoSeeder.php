<?php

namespace Database\Seeders;

use App\Models\EquipoMedico;
use Illuminate\Database\Seeder;

class EquipoMedicoSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    EquipoMedico::create([
      'cliente_id'    =>  1,
      'modalidad_id'  =>  6,
      'nombre'        =>  'Tomografo Hospital de la Mujer Morelia',
      'modelo'        =>  'Brightspeed',
      'serie'         =>  '56952YC5',
      'fabricante'    =>  'GE'
    ]);
  }
}
