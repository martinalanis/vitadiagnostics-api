<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposMedicosTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('equipos_medicos', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('cliente_id')->unsigned()->nullable();
      $table->bigInteger('modalidad_id')->unsigned()->nullable();
      $table->string('nombre');
      $table->string('modelo')->nullable();
      $table->string('serie')->nullable();
      $table->string('fabricante')->nullable();
      $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('set null')->onUpdate('cascade');
      $table->foreign('modalidad_id')->references('id')->on('modalidades')->onDelete('set null')->onUpdate('cascade');
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
    Schema::dropIfExists('equipos_medicos');
  }
}
