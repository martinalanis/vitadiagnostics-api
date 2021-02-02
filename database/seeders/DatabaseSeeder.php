<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
    $this->call([
      RolSeeder::class,
      UserSeeder::class,
      ModalidadSeeder::class,
      CotizacionTipoSeeder::class,
      ClienteSeeder::class,
      EquipoMedicoSeeder::class
    ]);
  }
}
