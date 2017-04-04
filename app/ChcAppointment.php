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

  /*
  Gets appoitnment for doctors or patients.
  param: option = either doctor or patient.
  param: id = person id.
  return: retrun appoitnments
  */
  public static function getAppointments($option , $id)
  {
    if($option == 1)
    {
      $search = 'chc_appointments.doctor_id';
    }
    if($option == 2)
    {
      $search = 'chc_appointments.patient_id';
    }

    $appoitnments = DB::table('chc_appointments')
    ->join('chc_staff', 'chc_appointments.doctor_id', '=', 'chc_staff.id')
    ->join('chc_patients', 'chc_appointments.patient_id', '=', 'chc_patients.id')
    ->select('chc_appointments.id','chc_appointments.patient_id', 'chc_staff.name', 'chc_staff.last_name', 'chc_appointments.time',
    'chc_appointments.date', 'chc_appointments.status_id', 'chc_patients.name AS patient_name', 'chc_patients.last_name AS patient_last_name')
    ->where($search, '=', $id)
    ->orderBy('chc_appointments.time','chc_appointments.date')
    ->get();

    return $appoitnments;
  }
}
