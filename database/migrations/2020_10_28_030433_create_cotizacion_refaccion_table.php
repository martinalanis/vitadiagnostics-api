<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionRefaccionTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('cotizacion_refaccion', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('cotizacion_id')->unsigned();
      $table->bigInteger('refaccion_id')->unsigned();
      $table->integer('cantidad')->unsigned();
      $table->decimal('precio_unitario', 7, 2);
      $table->decimal('importe', 7, 2);
      $table->foreign('cotizacion_id')->references('id')->on('cotizaciones')->onDelete('cascade')->onUpdate('cascade');
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
    Schema::dropIfExists('cotizacion_refaccion');
  }
}
