<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Cliente::create([
      'nombre'        =>  'Hospital Civil',
      'razon_social'  =>  'HCV5489',
      'email'         =>  'rh@hcivil.com',
      'telefonos'     =>  '4465898989',
      'direccion'     =>  'Lazaro Cardenas 59 Chapultepec',
      'estado'        =>  'Michoacán',
      'municipio'     =>  'Morelia'
    ]);
  }
}
