<?php

use Illuminate\Database\Seeder;

class PatientTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    DB::table('chc_patient')->insert(['name' => 'Jakub', 'last_name' => 'Chruslicki','address' => 'Some address in UK','date_of_birth' => 19961228,'contact_number'=>"023948191", 'doctor_id'=>2]);
  }
}
