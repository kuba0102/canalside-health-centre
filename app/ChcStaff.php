<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ChcStaff extends Model
{
  protected $table = 'chc_staff';

/*
This method gets the list of doctors from the data base
return: docList = list of doctors.
*/
  static function getDoctorList()
  {
    $docList = DB::table('chc_staff')
    ->join('chc_genders', 'chc_staff.gender_id', '=', 'chc_genders.id')
    ->select('chc_staff.id', 'chc_staff.name', 'chc_staff.last_name', 'chc_staff.gender_id', 'chc_genders.name AS genderName')
    ->orderBy('chc_staff.last_name')
    ->where('chc_staff.pos_id', '=', 2)
    ->get();
    return $docList;
  }
}
