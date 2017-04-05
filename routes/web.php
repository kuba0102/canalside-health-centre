<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function ()
{
  return view('index/index');
});
Route::get('home', 'StaffController@index');

Route::get('login', 'LoginController@loginForm');
Route::post('login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');

Route::get('checkInForm', 'CheckInController@checkInForm');
Route::post('checkIn', 'CheckInController@checkIn');
Route::get('checkIn/{appointId}/{patientId}', 'AppointmentController@checkIn')->middleware('can:managePatient,App\ChcPatient');

Route::get('addPatientForm', 'PatientController@addForm')->middleware('can:managePatient,App\ChcPatient');
Route::post('addPatient', 'PatientController@addPatient')->middleware('can:managePatient,App\ChcPatient');
Route::post('removePatient', 'PatientController@removePatient')->middleware('can:managePatient,App\ChcPatient');
Route::get('updatePatientForm/{patientId}', 'PatientController@updateForm')->middleware('can:managePatient,App\ChcPatient');
Route::post('updatePatient/{patientId}', 'PatientController@updatePatient')->middleware('can:managePatient,App\ChcPatient');

Route::get('allPatients', 'PatientController@allPatients')->middleware('can:managePatient,App\ChcPatient');
Route::get('details/{patientId}', 'PatientController@details');
Route::get('appointmentNote/{appointId}', 'AppointmentDetailsController@appointmentNote');

Route::get('addAppointmentForm/{patientId}/{doctorId}', 'AppointmentController@appointmentForm')->middleware('can:managePatient,App\ChcPatient');
Route::post('addAppointment', 'AppointmentController@addAppointment')->middleware('can:managePatient,App\ChcPatient');
Route::get('appointmentDetails/{appointId}', 'AppointmentController@appointmentDetails')->middleware('can:managePatient,App\ChcPatient');
Route::post('cancelAppoitnment', 'AppointmentController@appointmentRemove')->middleware('can:managePatient,App\ChcPatient');

Route::post('appointmentNoteForm', 'AppointmentDetailsController@appointmentNoteForm')->middleware('can:doctorOption,App\ChcPatient');
Route::post('addAppointmentNote', 'AppointmentDetailsController@addAppointmentNote')->middleware('can:doctorOption,App\ChcPatient');
Route::get('appointmentNotes/{patientId}', 'AppointmentDetailsController@appointmentNotes');
