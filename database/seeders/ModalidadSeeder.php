<?php

namespace Database\Seeders;

use App\Models\Modalidad;
use Illuminate\Database\Seeder;

class ModalidadSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Modalidad::insert([
      [
        'nombre'  =>  'PET CT',
        'tag'     =>  'PET/CT'
      ],
      [
        'nombre'  =>  'Rx fijo',
        'tag'     =>  'Rx Fijo'
      ],
      [
        'nombre'  =>  'Rx Móvil',
        'tag'     =>  'RX Movil'
      ],
      [
        'nombre'  =>  'Mastografía',
        'tag'     =>  'XM'
      ],
      [
        'nombre'  =>  'Arcos en C. Hemodinámica, Fluoroscopia',
        'tag'     =>  'XV'
      ],
      [
        'nombre'  =>  'Computed Tomography',
        'tag'     =>  'CT'
      ],
      [
        'nombre'  =>  'Resonancia Mágnetica',
        'tag'     =>  'RM'
      ],
      [
        'nombre'  =>  'Ultra Sonido',
        'tag'     =>  'US'
      ]
    ]);
  }
}
