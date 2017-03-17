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
}
