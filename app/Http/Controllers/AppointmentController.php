<?php

namespace App\Http\Controllers;
use App\ChcPatient;
use App\ChcStaff;
use App\ChcAppointment;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
  private $hour;
  private $min;
  private $second;

  /*
  Constructor for AppointmentController
  Checks if user is loged in.
  Sets time variables to default values:
  hour, min and second.
  */
  function __construct()
  {
    $this->middleware('auth'); //checks if user is loged in
    $this->hour = 8;
    $this->min = 30;
    $this->second = sprintf("%02d",0);
  }

  /*
  Simple timer class that increamnts minutes by 30 min.
  If min is equal to 60 min rool over back to 0 and increment hour by 1.
  */
  function incremenTime()
  {
    $this->min = $this->min + 30;
    if ($this->min == 60)
    {
      $this->min = sprintf("%02d",0);
      $this->hour = sprintf("%02d",$this->hour + 1);
    }
  }

  /*
  This method gets three time private variables and returns full time.
  Returns time.
  */
  function getTime()
  {
    return $this->hour.$this->min.$this->second;
  }

  /*
  Displays appointment form depending on user input.
  param: id = patient id
  */
  function appointmentForm($patientId, $doctorId, Request $request)
  {
    $appCheck = new ChcAppointment;
    $patient = ChcPatient::find($patientId);
    $doctors= ChcStaff::getDoctorList();
    $appoitnments = array();

    $date = date("Ymd");
    $requestDate = $request->year.$request->month.$request->day;
    $gender = 3;
    // checks if user wants to display other doctors as well
    if($request->otherDoctors == 1)
    {
      $doctorId = 0;
    }
    // checks if user wants to check other dates
    if($requestDate != $date)
    {
      $date = $requestDate;
    }
    // checks if user have specifed gender
    if($request->gender != $gender)
    {
      $gender = $request->gender;
    }
    $count=0; // count for while loop
    while($count <= 16)
    {
      $count++;
      $this->incremenTime();
      foreach($doctors as $doctor)
      { // checks if user wants to look for other doctors, also checks if user specifes doctors gender
        if(($doctor->id == $doctorId || $doctorId == 0) && ($doctor->gender_id == $gender || $gender == 3 ))
        {
          if($appCheck->appointmentCheck($doctor->id, $date, $this->getTime()) == 0)
          {
            array_push($appoitnments,
            ['docId' => $doctor->id, 'name' => $doctor->name, 'lastName' => $doctor->last_name , 'gender' => $doctor->genderName,
            'date' => $date,
            'hour' => $this->hour, 'min' => $this->min, 'second' => $this->second]);
          }
        }
      }
    }
    return view('appointment/appointment-form',['patient' => $patient], ['appoitnments' => $appoitnments]);
  }

  /*
  Validates and then process data from the form into database.
  Displays appoitment details and if appointment booking was sucesfull.
  Redirects to booked appoitment details page.
  */
  function addAppointment(Request $request)
  {
    $appointment = new ChcAppointment();
    $this->validate($request,
    [
    'docId' => 'required|numeric',
    'date' => 'required|numeric',
    'hour' => 'required|numeric',
    'min' => 'required|numeric',
    'second' => 'required|numeric',
    'patientId' => 'required|numeric'
    ]);

    $appointment->doctor_id = $request->docId;
    $appointment->patient_id = $request->patientId;
    $appointment->date = $request->date;
    $appointment->time = sprintf("%02d",$request->hour).sprintf("%02d",$request->min).sprintf("%02d",$request->second);
    $appointment->status_id = 2;
    $appointment->save();
    return redirect('appointmentDetails/'.$appointment->id);
  }

/*
Displays certain appointment details.
Find appointment by id.
Finds donctor details using appointment doctor id.
Finds patient details using appointment patient id.
*/
  function appointmentDetails($appointId)
  {
    $appoint = ChcAppointment::find($appointId);
    $doc = ChcStaff::find($appoint->doctor_id);
    $patient  = ChcPatient::find($appoint->patient_id);

    return view('appointment/appointment-details',['patient' => $patient, 'appoint' => $appoint, 'doc' => $doc]);
  }

  function appointmentRemove(Request $request)
  {
    ChcAppointment::destroy($request->appointId);
    return redirect('allPatients');
  }
}
