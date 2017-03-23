<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(PosTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(StaffTableSeeder::class);
        $this->call(PatientTableSeeder::class);
        $this->call(StatusAppointTableSeeder::class);
        $this->call(AppointmentsTableSeeder::class);
    }
}
