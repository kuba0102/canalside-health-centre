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
// processs form
Route::get('allPatients', 'PatientController@allPatients')->middleware('can:create,App\ChcPatient');
