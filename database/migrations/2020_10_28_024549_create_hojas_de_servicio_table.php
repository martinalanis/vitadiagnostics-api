<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHojasDeServicioTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('hojas_de_servicio', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('reporte_id')->unsigned();
      $table->bigInteger('user_id')->unsigned()->nullable();
      $table->date('fecha');
      $table->time('inicio')->nullable();
      $table->time('fin')->nullable();
      $table->text('diagnostico')->nullable();
      $table->text('acciones_tomadas')->nullable();
      $table->text('pruebas_realizadas')->nullable();
      $table->text('estatus_final')->nullable();
      $table->foreign('reporte_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
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
    Schema::dropIfExists('hojas_de_servicio');
  }
}
