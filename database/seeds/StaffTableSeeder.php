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
    DB::table('chc_staff')->insert(['name' => 'Kate', 'last_name' => 'Smith', 'gender_id' => 2, 'email' => 'k.l.hutton@hudstudent.ac.uk','password' => bcrypt('password'),'pos_id'=>1]);
    DB::table('chc_staff')->insert(['name' => 'Yousef','last_name' => 'Jones', 'gender_id' => 1, 'email' => 'y.miandad@hudstudent.ac.uk','password' => bcrypt('letmein'),'pos_id'=>2]);
    DB::table('chc_staff')->insert(['name' => 'Sunil','last_name' => 'June','gender_id' => 1, 'email' => 's.laxman@hudstudent.ac.uk','password' => bcrypt('password2'),'pos_id'=>1]);
    DB::table('chc_staff')->insert(['name' => 'Jake','last_name' => 'Wright','gender_id' => 1, 'email' => 'jake@ac.uk','password' => bcrypt('password'),'pos_id'=>2]);
    DB::table('chc_staff')->insert(['name' => 'Jordan','last_name' => 'Lake','gender_id' => 1, 'email' => 'j.lake@ac.uk','password' => bcrypt('password'),'pos_id'=>2]);
    DB::table('chc_staff')->insert(['name' => 'Emily','last_name' => 'Dennis','gender_id' => 2, 'email' => 'e.dennis@ac.uk','password' => bcrypt('password'),'pos_id'=>2]);
  }
}
