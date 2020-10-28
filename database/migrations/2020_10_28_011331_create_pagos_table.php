<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('pagos', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('cotizacion_id')->unsigned();
      $table->date('fecha');
      $table->decimal('total', 7, 2);
      $table->string('file_url');
      $table->foreign('cotizacion_id')->references('id')->on('cotizaciones')->onDelete('cascade')->onUpdate('cascade');
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
    Schema::dropIfExists('pagos');
  }
}
