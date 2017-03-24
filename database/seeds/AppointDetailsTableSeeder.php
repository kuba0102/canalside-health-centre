<?php

use Illuminate\Database\Seeder;

class AppointDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('chc_appointment_details')->insert(['appointment_id' => 1, 'doctor_id' => 2, 'patient_id' => 1, 'notes' => 'Big headache', 'prescription' => 'Painkillers']);
      DB::table('chc_appointment_details')->insert(['appointment_id' => 2, 'doctor_id' => 2, 'patient_id' => 1, 'notes' => 'Small headache', 'prescription' => 'Ibuprofen']);
    }
}
