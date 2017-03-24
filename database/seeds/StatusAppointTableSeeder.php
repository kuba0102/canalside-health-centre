<?php

use Illuminate\Database\Seeder;

class StatusAppointTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('chc_status_appointments')->insert(['id' => 1, 'name' => 'Attended', 'description' => 'Patient has attended the appointment.']);
      DB::table('chc_status_appointments')->insert(['id' => 2 , 'name' => 'Not Attended', 'description' => 'Patient has not attended the appointment.']);
    }
}
