<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('nombre');
      $table->string('titulo')->nullable();
      $table->string('email')->unique();
      $table->string('telefono')->nullable();
      $table->string('rfc')->nullable();
      $table->string('direccion')->nullable();
      $table->string('cp')->nullable();
      $table->string('estado')->nullable();
      $table->string('municipio')->nullable();
      $table->bigInteger('rol_id')->unsigned()->nullable();
      $table->foreign('rol_id')->references('id')->on('roles')->onDelete('set null')->onUpdate('cascade');
      $table->tinyInteger('estatus')->default(1);
      $table->string('password');
      $table->rememberToken();
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
    Schema::dropIfExists('users');
  }
}
