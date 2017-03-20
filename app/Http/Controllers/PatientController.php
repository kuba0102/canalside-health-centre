<?php

namespace App\Http\Controllers;
use App\ChcPatient;

use Illuminate\Http\Request;

class PatientController extends Controller
{

  function __construct()
  {
    $this->middleware('auth');
  }

  function addForm()
  {
      return view('patient/add-patient-form');
  }

  function allPatients()
  {
    $patients = ChcPatient::all();
    return view('patient/all-patients',['patients' => $patients]);
  }

  /*
  Returns all infromation
  param: member_id member id
  Display member information
  */
  function details($patientId)
  {
    $patient = ChcPatient::find($patientId);
    return view('patient/details',['patient' => $patient]);
  }
}
