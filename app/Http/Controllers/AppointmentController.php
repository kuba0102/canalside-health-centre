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

  function __construct()
  {
    $this->middleware('auth'); //checks if user is loged in
    $this->hour = 9;
    $this->min = 00;
    $this->second = sprintf("%02d",0);
  }

  function incremenTime()
  {
    $this->min = $this->min + 30;
    if ($this->min == 60)
    {
      $this->min = sprintf("%02d",0);
      $this->hour = sprintf("%02d", $this->hour + 1);
    }
  }

  function getTime()
  {
    return $this->hour.$this->min.$this->second;
  }

  /*
  param: id = patient id
  */
  function appointmentForm($patientId)
  {
    $doctorId = 0;

    $appCheck = new ChcAppointment;
    $patient = ChcPatient::find($patientId);
    $doctors= ChcStaff::getDoctorList();
    $count=0;
    $date = date("Ymd");
    $appoitnments = array();

    //  echo $appCheck->appointmentCheck(2, 20170322, 103000);
    while($count <= 4)
    {
      $count++;
      foreach($doctors as $doctor)
      {
        if($doctor->id == $doctorId || $doctorId == 0)
        {
          if($appCheck->appointmentCheck($doctor->id, $date, $this->getTime()) == 0)
          {
            array_push($appoitnments,['docId' => $doctor->id, 'name' => $doctor->name, 'lastName' => $doctor->last_name , 'gender' => $doctor->genderName,'date' => $date, 'time' => $this->getTime()]);
          }
        }
      }
      $this->incremenTime();
    }

    return view('appointment/appointment-form',['patient' => $patient], ['appoitnments' => $appoitnments]);
  }

  function appointmentDetails(Request $request)
  {
    return view('appointment/appointment-details');
  }
}
