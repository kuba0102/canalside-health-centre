<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChcAppointment;

class StaffController extends Controller
{

  function __construct()
  {
    $this->middleware('auth');
  }

/*
Returns differnt views depednig on user that is logged in.
For Recepcionist it will just return recepcionist home page.
For Doctor it will find all appointments for that certain doctor
and return doctor hope page.
*/
  function index()
  {
    if(\Auth::user()->pos_id == 1)
    {
      return view('index/index-recep');
    }
    elseif (\Auth::user()->pos_id == 2)
    {
      $docAppoints = ChcAppointment::getAppointments(1,\Auth::user()->id);
      return view('index/index-doc',['appointments' => $docAppoints]);
    }


  }
}
