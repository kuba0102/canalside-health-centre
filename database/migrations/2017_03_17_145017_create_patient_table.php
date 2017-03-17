<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('chc_patient', function (Blueprint $table)
    {
      $table->increments('id')->unsigned();
      $table->integer('doctor_id')->unsigned()->nullable();
      $table->foreign('doctor_id')->references('id')->on('chc_staff')->onDelete('set null');
      $table->string('name');
      $table->string('last_name');
      $table->string('address');
      $table->date('date_of_birth');
      $table->string('contact_number');
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
    Schema::dropIfExists('chc_patient');
  }
}
