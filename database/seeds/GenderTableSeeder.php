<?php

use Illuminate\Database\Seeder;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('chc_genders')->insert(['id' => 1, 'name' => 'Male']);
      DB::table('chc_genders')->insert(['id' => 2, 'name' => 'Female']);
    }
}
