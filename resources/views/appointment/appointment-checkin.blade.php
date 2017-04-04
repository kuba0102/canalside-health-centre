@extends('layouts.master')
@section('title', 'Appointment Notes and Prescriptions')
@section('content')
<!-- Patient Details -->
<h1>Appointment Notes and Prescriptions</h1>
<div class="panel panel-default">
  <div class="panel-body">
    <h4><label>Patient Details</label></h4>
    <p>Unique ID: {{@$patient->id}}</p>
    <p>Name: {{@$patient->name}} {{@$patient->last_name}}</p>
    <p>Date Of Birth: {{@$patient->date_of_birth}}</p>
  </div>

  <input type="button" onclick="window.location.href='{{url('checkin')}}'" name="submitBtn" value="Back">
</div>
</div>
</div>
@endsection
