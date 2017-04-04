<?php

namespace App\Http\Controllers;
use App\ChcAppointmentDetail;
use App\ChcAppointment;
use App\ChcPatient;

use Illuminate\Http\Request;

class AppointmentDetailsController extends Controller
{
  /*
  Constructor for AppointmentDetailsController
  Checks if user is logged in.
  */
  function __construct()
  {
    $this->middleware('auth'); //checks if user is loged in
  }

  /*
  Displays Note and prescription form.
  Checks if certain appointmant has any nores or prescriptions
  param: request = data from form.
  */
  function appointmentNoteForm(Request $request)
  {
    $appointment = ChcAppointment::find($request->appointId);
    $appointDetails = ChcAppointmentDetail::where('appointment_id', $request->appointId)->first();
    $patient = ChcPatient::find($appointment->patient_id);
    $isNoteEmpty ="false";
    if($appointDetails == null)
    {
      $isNoteEmpty = "true";
    }

    return view('appointment\appointment-note-form', ['appointment' => $appointment, 'patient' => $patient,
    'appointDetails' => $appointDetails, 'isNoteEmpty' => $isNoteEmpty]);
  }

  /*
  This method adds appointment notes or prescriptions.
  Checks if appointment alrady has any notes or prescriptions
  param: request = data sent from the form.
  */
  function addAppointmentNote(Request $request)
  {
    if($request->isNoteEmpty == "true")
    {
      $appointmentNote = new ChcAppointmentDetail();
    }
    elseif($request->isNoteEmpty == "false")
    {
      $appointmentNote = ChcAppointmentDetail::find($request->appintNoteId);
    }
    $appointmentNote->appointment_id = $request->appointId;
    $appointmentNote->doctor_id = $request->doctorId;
    $appointmentNote->patient_id = $request->patientId;
    $appointmentNote->notes = $request->note;
    $appointmentNote->prescription = $request->prescription;
    $appointmentNote->save();
    return redirect('home');
  }

  /*
  This method displays all patient notes and prescriptions starting from most rected one.
  param: patientId = patient unique id.
  */
  function appointmentNotes($patientId)
  {
    $appointmentNotes = ChcAppointmentDetail::getAppointmentNotes($patientId);
    $patient = ChcPatient::find($patientId);
    return view('appointment\appointment-notes', ['appointmentNotes' => $appointmentNotes, 'patient' => $patient]);
  }

  /*
  This method displays patient note and prescription for the certain appointment.
  param: appointId = appointment unique id.
  */
  function appointmentNote($appointId)
  {
    $appointment = ChcAppointment::find($appointId);
    $patient = ChcPatient::find($appointment->patient_id);
    $appointmentNote = ChcAppointmentDetail::getAppointmentNote($appointId, $appointment->patient_id);
    return view('appointment\appointment-notes', ['appointmentNotes' => $appointmentNote, 'patient' => $patient]);
  }
}
