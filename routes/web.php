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

Route::get('addPatientForm', 'PatientController@addForm')->middleware('can:create,App\ChcPatient');
Route::post('addPatient', 'PatientController@addPatient')->middleware('can:create,App\ChcPatient');
Route::post('removePatient', 'PatientController@removePatient')->middleware('can:create,App\ChcPatient');
Route::get('updatePatientForm/{patientId}', 'PatientController@updateForm')->middleware('can:create,App\ChcPatient');
Route::post('updatePatient/{patientId}', 'PatientController@updatePatient')->middleware('can:create,App\ChcPatient');

Route::get('allPatients', 'PatientController@allPatients')->middleware('can:create,App\ChcPatient');
Route::get('details/{patientId}', 'PatientController@details');

Route::get('addAppointmentForm/{patientId}', 'AppointmentController@appointmentForm')->middleware('can:create,App\ChcPatient');
Route::post('appointmentDetails', 'AppointmentController@appointmentDetails');
