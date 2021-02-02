<?php

namespace Database\Seeders;

use App\Models\CotizacionTipo;
use Illuminate\Database\Seeder;

class CotizacionTipoSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    CotizacionTipo::insert([
      [
        'nombre'  =>  'Mantenimiento Correctivo',
        'tag'     =>  'MC'
      ],
      [
        'nombre'  =>  'Mantenimiento Preventivo',
        'tag'     =>  'MP'
      ],
      [
        'nombre'  =>  'Refacciones',
        'tag'     =>  'Refacciones'
      ]
    ]);
  }
}
