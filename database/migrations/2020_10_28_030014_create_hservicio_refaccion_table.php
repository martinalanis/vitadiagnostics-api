<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHservicioRefaccionTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('hservicio_refaccion', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('hoja_de_servicio_id')->unsigned();
      $table->bigInteger('refaccion_id')->unsigned();
      $table->integer('cantidad')->unsigned();
      $table->foreign('hoja_de_servicio_id')->references('id')->on('hojas_de_servicio')->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('refaccion_id')->references('id')->on('refacciones')->onDelete('cascade')->onUpdate('cascade');
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
    Schema::dropIfExists('hservicio_refaccion');
  }
}
