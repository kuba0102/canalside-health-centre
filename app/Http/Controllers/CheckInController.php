<?php

namespace App\Http\Controllers;

use App\ChcPatient;
use App\ChcStaff;
use App\ChcAppointment;
use Illuminate\Http\Request;

class CheckInController extends Controller
{
  /*
  Displays checkin page.
  */
  function checkInForm()
  {
    return view('appointment/appointment-checkInForm');
  }

  /*
  Checks patient in and display appointment details.
  param: request = id or date of birth from the form.
  return: returns checkin view with some appoitnment information.
  */
  function checkIn(Request $request)
  {
    $this->validate($request,
    [
      'patientId' => 'numeric',
      'patientDob' => 'date'
    ]);
    if(isset($request->patientId))
    {
      $checkin = $request->patientId;
    }
    if(isset($request->patientDob))
    {
      $checkin = $request->patientDob;
    }

    $patient  = ChcPatient::getPatientByIdOrDob($checkin);
    $patient = json_decode($patient, true);
    $appoints = ChcAppointment::getAppointments(2,$patient[0]['id']);
    $appoints = json_decode($appoints, true);

    foreach($appoints as $appoint)
    {
      if($appoint['date'] == date('Y-m-d'))
      {
        $appointment = $appoint;
      }
    }
    if(isset($appointment['date']))
    {
      $appoint = ChcAppointment::find($appointment['id']);
      $appoint->status_id = 1;
      $appoint->save();
    }
    else
    {
       $appointment = ['msg' => "No appointments found please ask for help at reception desk."];
    }

    return view('appointment/appointment-checkIn', ['appoint' => $appointment]);
  }
}
