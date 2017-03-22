<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ChcStaff extends Model
{
  protected $table = 'chc_staff';

/*
return: docList = list of doctors.
*/
  static function getDoctorList()
  {
    $docList = DB::table('chc_staff')
    ->select('id', 'name', 'last_name')
    ->orderBy('last_name','desc')
    ->where('pos_id', '=', 2)
    ->get();
    return $docList;
  }
}
