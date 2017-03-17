<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('chc_staff', function (Blueprint $table)
    {
      $table->increments('id')->unsigned();
      $table->integer('pos_id')->unsigned()->nullable();
      $table->foreign('pos_id')->references('id')->on('chc_position')->onDelete('set null');
      $table->string('name');
      $table->string('last_name');
      $table->string('email')->unique();
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
    Schema::dropIfExists('chc_staff');
  }
}
