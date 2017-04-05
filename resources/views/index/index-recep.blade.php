@extends('layouts.master')

@section('title', 'Home')

@section('content')
<h1>Main Menu</h1>
<div class="panel panel-default">
  <div class="panel-body">
    @if (session('loginError'))
    <div>
      {{ session('loginError') }}
    </div>
    @endif

    <h1> Receptionist </h1>
    </div>
  </div>
  @endsection
