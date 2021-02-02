<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('cotizaciones', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('cliente_id')->unsigned()->nullable();
      $table->bigInteger('user_id')->unsigned()->nullable();
      $table->bigInteger('tipo_id')->unsigned()->nullable();
      $table->date('fecha');
      $table->string('estatus');
      $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('set null')->onUpdate('cascade');
      $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
      $table->foreign('tipo_id')->references('id')->on('cotizacion_tipo')->onDelete('set null')->onUpdate('cascade');
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
    Schema::dropIfExists('cotizaciones');
  }
}
