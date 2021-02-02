<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    User::create([
      'nombre'    =>  'Administrador',
      'email'     =>  'admin@vita.com',
      'rol_id'    =>  1,
      'password'  =>  '123456',
    ]);
  }
}
