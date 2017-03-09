<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
  function loginForm()
  {
      return view('login/login');
  }
  function login(Request $request)
  {
      if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
          return redirect('/login');
      }
      $request->session()->flash('loginError', "Those details aren't correct");
      return redirect('/login');
  }
}
