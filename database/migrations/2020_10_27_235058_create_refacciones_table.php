<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefaccionesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('refacciones', function (Blueprint $table) {
      $table->id();
      $table->string('nombre');
      $table->string('num_parte')->nullable();
      $table->bigInteger('modalidad_id')->unsigned()->nullable();
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
    Schema::dropIfExists('refacciones');
  }
}
