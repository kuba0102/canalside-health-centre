<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{

  function __construct()
  {
    $this->middleware('auth');
  }

  function index()
  {
    return view('index/index');
  }
}
