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

  /*
   Process infromation from add member form
   */
   function addPatient(Request $request)
   {
     $this->validate($request,
     [
     'name' => 'required|max:100',
     'lastName' => 'required|max:100',
     'mbNum' => 'required|numeric',
     'address' => 'required|max:200'
     ]);
     $patient = new ChcPatient();
     $patient->name = $request->name;
     $patient->last_name = $request->lastName;
     $patient->contact_number = $request->mbNum;
     $patient->address = $request->address;
     $patient->doctor_id = $request->docId;
     $patient->date_of_birth = $request->DOBYear.$request->DOBMonth.$request->DOBDay;
     //$dateJoined = date('Ymd');
     //$member->member_date_joined=$dateJoined;
     $patient->save();
     return redirect('allPatients');
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
