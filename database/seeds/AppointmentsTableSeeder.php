<?php

use Illuminate\Database\Seeder;

class AppointmentsTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    DB::table('chc_appointments')->insert(['doctor_id' => 2,'patient_id' => 1, 'date' => 20170322, 'time' => 103000]);
  }
}
