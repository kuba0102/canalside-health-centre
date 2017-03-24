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
    DB::table('chc_appointments')->insert(['doctor_id' => 2,'patient_id' => 1, 'date' => date('Ymd'), 'time' => 93000]);
    DB::table('chc_appointments')->insert(['doctor_id' => 2,'patient_id' => 1, 'date' => date('Ymd'), 'time' => 103000]);
    DB::table('chc_appointments')->insert(['doctor_id' => 2,'patient_id' => 1, 'date' => date('Ymd'), 'time' => 100000]);
    DB::table('chc_appointments')->insert(['doctor_id' => 2,'patient_id' => 1, 'date' => date('Ymd'), 'time' => 130000]);
  }
}
