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
      DB::table('chc_staff')->insert(['name' => 'Kate','email' => 'k.l.hutton@hudstudent.ac.uk','password' => bcrypt('password'),'role'=>1]);
      DB::table('chc_staff')->insert(['name' => 'Yousef','email' => 'y.miandad@hudstudent.ac.uk','password' => bcrypt('letmein'),'role'=>2]);
      DB::table('chc_staff')->insert(['name' => 'Sunil','email' => 's.laxman@hudstudent.ac.uk','password' => bcrypt('password2'),'role'=>1]);
  }
}
