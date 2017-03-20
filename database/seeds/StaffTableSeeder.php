<?php

use Illuminate\Database\Seeder;

class StaffTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    DB::table('chc_staff')->insert(['name' => 'Kate', 'last_name' => 'Smith','email' => 'k.l.hutton@hudstudent.ac.uk','password' => bcrypt('password'),'pos_id'=>1]);
    DB::table('chc_staff')->insert(['name' => 'Yousef','last_name' => 'Jones', 'email' => 'y.miandad@hudstudent.ac.uk','password' => bcrypt('letmein'),'pos_id'=>2]);
    DB::table('chc_staff')->insert(['name' => 'Sunil','last_name' => 'June', 'email' => 's.laxman@hudstudent.ac.uk','password' => bcrypt('password2'),'pos_id'=>1]);
  }
}
