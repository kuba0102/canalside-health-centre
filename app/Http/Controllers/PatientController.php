<?php
namespace App\Http\Controllers;
use App\ChcPatient;
use App\ChcStaff;
use App\ChcGender;
use App\ChcAppointment;

use Illuminate\Http\Request;

class PatientController extends Controller
{
  /*
  Construcotr which checks if staff is logged in.
  */
  function __construct()
  {
    $this->middleware('auth'); //checks if user is loged in
  }

  /*
  Get the array of doctors.
  Retuns patient form view.
  */
  function addForm()
  {
    $docList = ChcStaff::getDoctorList();
    return view('patient/add-patient-form',['doctors' => $docList]);
  }

  /*
  Process infromation from add patient form.
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
      'docId' => 'required|numeric',
      'gender' => 'required|numeric'
    ]);
    $lastId = ChcPatient::getLastPatientId();
    $lastId = $lastId[0]->id;

    $patient = new ChcPatient();
    $patient->id = $lastId + 1;
    $patient->name = $request->name;
    $patient->last_name = $request->lastName;
    $patient->contact_number = $request->mbNum;
    $patient->gender_id = $request->gender;
    $patient->address = $request->address;
    $patient->doctor_id = $request->docId;
    $patient->date_of_birth = $request->DOBYear.$request->DOBMonth.$request->DOBDay;
    $patient->save();
    return redirect('allPatients');
  }

  /*
  Gets all patients from the data base.
  Retunrs all patients from data base.
  */
  function allPatients()
  {
    $patients = ChcPatient::all();
    return view('patient/all-patients',['patients' => $patients]);
  }

  /*
  Get patient by name / by id or by address
  Retunrs all patients from data base.
  */
  function patientByNameIDAddre(Request $request)
  {
    if(isset($request->search))
    {
      $patients = ChcPatient::patientByNameIDAddre($request->search);
      return view('patient/all-patients',['patients' => $patients, 'searchTerm' => $request->search]);
    }
    else
    {
      return redirect('allPatients');
    }
  }

  /*
  Returns all infromation.
  param: member_id member id.
  Display member information.
  */
  function details($patientId)
  {
    $patient = ChcPatient::find($patientId);
    $doctor = ChcStaff::find($patient->doctor_id);
    $gender = ChcGender::find($patient->gender_id);
    $appointments = ChcAppointment::getAppointments(2, $patientId);

    return view('patient/details',['patient' => $patient, 'doctor' => $doctor, 'gender' => $gender, 'appointments' => $appointments]);
  }

  /*
  Remove user and redirct to list of all patients.
  */
  function removePatient(Request $request)
  {
    ChcPatient::destroy($request->patient);
    return redirect('allPatients');
  }

  /*
  This method displays update form.
  param: id = patient id.
  returns update form.
  */
  function updateForm($patientId)
  {
    $patient = ChcPatient::find($patientId);
    $docList = ChcStaff::getDoctorList();
    return view('patient/update-patient-form',['patient' => $patient], ['doctors' => $docList]);
  }

  /*
  param: patietId = patient id to be updated.
  Process infromation from update member form.
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
    'docId' => 'required|numeric',
    'gender' => 'required|numeric'
    ]);

    $patient = ChcPatient::find($patientId);
    $patient->name = $request->name;
    $patient->last_name = $request->lastName;
    $patient->contact_number = $request->mbNum;
    $patient->address = $request->address;
    $patient->gender_id = $request->gender;
    $patient->doctor_id = $request->docId;
    $patient->date_of_birth = $request->DOBYear.$request->DOBMonth.$request->DOBDay;
    $patient->save();
    return redirect('allPatients');
  }
}
