<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('reportes', function (Blueprint $table) {
      $table->id();
      $table->string('folio')->unique();
      $table->bigInteger('cliente_id')->unsigned()->nullable();
      $table->bigInteger('user_id')->unsigned()->nullable();
      $table->bigInteger('equipo_id')->unsigned()->nullable();
      $table->bigInteger('cotizacion_id')->unsigned()->nullable();
      $table->date('fecha');
      $table->string('sintoma');
      $table->string('tipo');
      $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('set null')->onUpdate('cascade');
      $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
      $table->foreign('equipo_id')->references('id')->on('equipos_medicos')->onDelete('set null')->onUpdate('cascade');
      $table->foreign('cotizacion_id')->references('id')->on('cotizaciones')->onDelete('set null')->onUpdate('cascade');
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
    Schema::dropIfExists('reportes');
  }
}
