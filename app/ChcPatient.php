<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ChcPatient extends Model
{
  /*
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
}
