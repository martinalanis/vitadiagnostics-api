<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('clientes', function (Blueprint $table) {
      $table->id();
      $table->string('nombre');
      $table->string('razon_social');
      $table->string('email');
      $table->string('telefonos')->nullable();
      $table->string('rfc')->nullable();
      $table->string('direccion')->nullable();
      $table->string('cp')->nullable();
      $table->string('estado')->nullable();
      $table->string('municipio')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('clientes');
  }
}
