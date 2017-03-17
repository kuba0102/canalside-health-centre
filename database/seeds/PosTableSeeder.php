<?php

use Illuminate\Database\Seeder;

class PosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('chc_position')->insert(['name' => 'Receptionist','description' => 'Receptionist']);
          DB::table('chc_position')->insert(['name' => 'Doctor','description' => 'Doctor']);
    }
}
