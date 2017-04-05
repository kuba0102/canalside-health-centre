<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ChcPatient extends Model
{
  /*
  Get last patient id.
  return: retrun last pateint id
  */
  public static function getLastPatientId()
  {
    $lastId = DB::table('chc_patients')
    ->select('id')
    ->orderBy('id','desc')
    ->limit(1)
    ->get();
    return $lastId;
  }

  /*
  Returns patient by id or by date of birth.
  param: checkin = either patietns id or date of birth.
  return: retrun patient = patient details.
  */
  public static function getPatientByIdOrDob($checkin)
  {
    $patient = DB::table('chc_patients')
    ->select('id', 'name', 'last_name', 'date_of_birth')
    ->where('id', '=', $checkin)
    ->orWhere('date_of_birth', '=', $checkin)
    ->get();
    return $patient;
  }
}
