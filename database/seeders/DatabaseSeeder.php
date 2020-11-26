<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Rol;
use App\Models\Modalidad;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // User::factory(10)->create();
    // Rol::create([
    //   'nombre'  =>  'administrador'
    // ]);
    // User::create([
    //   'nombre'    =>  'Administrador',
    //   'email'     =>  'admin@vita.com',
    //   'rol_id'    =>  1,
    //   'password'  =>  bcrypt('123456'),
    // ]);
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
