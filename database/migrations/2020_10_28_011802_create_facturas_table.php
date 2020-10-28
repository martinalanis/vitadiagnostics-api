<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('facturas', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('pago_id')->unsigned();
      $table->date('fecha');
      $table->string('file_url');
      $table->foreign('pago_id')->references('id')->on('pagos')->onDelete('cascade')->onUpdate('cascade');
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
    Schema::dropIfExists('facturas');
  }
}
