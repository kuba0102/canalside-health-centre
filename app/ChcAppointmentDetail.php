<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ChcAppointmentDetail extends Model
{
  /*
  This metod returns pateint appointmens notes and prescription.
  param: patientId = patient unique number.
  */
  public static function getAppointmentNotes($patientId)
  {
    $appoitnment = DB::table('chc_appointment_details')
    ->join('chc_staff', 'chc_appointment_details.doctor_id', '=', 'chc_staff.id')
    ->select('chc_appointment_details.notes', 'chc_appointment_details.prescription', 'chc_appointment_details.updated_at',
    'chc_staff.name', 'chc_staff.last_name', 'chc_appointment_details.appointment_id')
    ->where('chc_appointment_details.patient_id', '=', $patientId)
    ->orderBy('chc_appointment_details.updated_at','desc')
    ->get();
    return $appoitnment;
  }
}
