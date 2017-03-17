<?php

namespace App\Http\Controllers;

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
}
