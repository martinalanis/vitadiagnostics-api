<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Rol;

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
    Rol::create([
      'nombre'  =>  'administrador'
    ]);
    User::create([
      'nombre'    =>  'Administrador',
      'apellido'  =>  'General',
      'email'     =>  'admin@vita.com',
      'rol_id'    =>  1,
      'password'  =>  bcrypt('123456'),
    ]);
  }
}
