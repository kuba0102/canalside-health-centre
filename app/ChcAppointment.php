<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ChcAppointment extends Model
{

  /*
  Checks if appointment is already in the data base.
  Returns 0 if the is no appoitnment for that date, time and doctor.
  Returns 1 if the is appoitnment for that date, time and doctor.
  */
    public static function appointmentCheck($doctorId, $date, $time)
    {
      $appoitnment = DB::table('chc_appointments')
      ->where('doctor_id', '=', $doctorId)
      ->where('time', '=', $time)
      ->where('date', '=', $date)
      ->get();
      if(count($appoitnment) == 0)
      {
        // no appoitment made
        return 0;
      }
      else
      {
        // there is an appointment
        return 1;
      }
    }
}
