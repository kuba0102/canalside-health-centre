<?php

namespace App\Http\Controllers;
use App\ChcPatient;
use App\ChcStaff;

use Illuminate\Http\Request;

class PatientController extends Controller
{

  function __construct()
  {
    $this->middleware('auth'); //checks if user is loged in
  }

  function addForm()
  {
    $docList = ChcStaff::getDoctorList();
    return view('patient/add-patient-form',['doctors' => $docList]);
  }

  /*
  Process infromation from add patient form
  */
  function addPatient(Request $request)
  {
    $this->validate($request,
    [
      'name' => 'required|max:100',
      'lastName' => 'required|max:100',
      'mbNum' => 'required|numeric',
      'address' => 'required|max:200',
      'DOBYear' => 'required|numeric',
      'DOBMonth' => 'required|numeric',
      'DOBDay' => 'required|numeric',
      'docId' => 'required|numeric'
    ]);
    $lastId = ChcPatient::getLastPatientId();
    $lastId = $lastId[0]->id;

    $patient = new ChcPatient();
    $patient->id = $lastId + 1;
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

  /*
  Retunrs all patients from data base
  */
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
    $doctor = ChcStaff::find($patient->doctor_id);
    return view('patient/details',['patient' => $patient, 'doctor' => $doctor]);
  }

  /*
  Remove user and display list of all members
  */
  function removePatient(Request $request)
  {
    ChcPatient::destroy($request->patient);
    return redirect('allPatients');
  }

  /*
  param: id = patient id
  Display update members details
  */
  function updateForm($patientId)
  {
    $patient = ChcPatient::find($patientId);
    $docList = ChcStaff::getDoctorList();
    return view('patient/update-patient-form',['patient' => $patient], ['doctors' => $docList]);
  }

  /*
  param: patietId = patient id to be updated
  Process infromation from update member form
  */
  function updatePatient(Request $request, $patientId)
  {
    $this->validate($request,
    [
    'name' => 'required|max:100',
    'lastName' => 'required|max:100',
    'mbNum' => 'required|numeric',
    'address' => 'required|max:200',
    'DOBYear' => 'required|numeric',
    'DOBMonth' => 'required|numeric',
    'DOBDay' => 'required|numeric',
    'docId' => 'required|numeric'
    ]);

    $patient = ChcPatient::find($patientId);
    $patient->name = $request->name;
    $patient->last_name = $request->lastName;
    $patient->contact_number = $request->mbNum;
    $patient->address = $request->address;
    $patient->doctor_id = $request->docId;
    $patient->date_of_birth = $request->DOBYear.$request->DOBMonth.$request->DOBDay;
    $patient->save();
    return redirect('allPatients');
  }
}
