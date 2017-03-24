@extends('layouts.master')
@section('title', 'Appointment Details')
@section('content')
<!-- Patient Details -->
<h1>Appointment Details</h1>
<div class="panel panel-default">
  <div class="panel-body">
    <h4><label>Patient Details</label></h4>
    <p>Unique ID: {{@$patient->id}}</p>
    <p>Name: {{@$patient->name}} {{@$patient->last_name}}</p>
    <p>Date Of Birth: {{@$patient->date_of_birth}}</p>
  </div>
  @foreach($appointmentNotes as $note)
  <div class="well well-sm">
    <h4><label>Appointment Id: {{@$note->appointment_id}}</label></h4>
    <p>Updated At: {{@$note->updated_at}}</p>
    <h4><label>Doctor Name</label></h4>
    <p>{{@$note->name}} {{@$note->last_name}}</p>
    <h4><label>Note</label></h4>
    <p>{{@$note->notes}}</p>
    <h4><label>Prescription</label></h4>
    <p>{{@$note->prescription}}</p>
  </div>
  @endforeach
  <input type="button" onclick="window.location.href='{{url('home')}}'" name="submitBtn" value="Back">
</div>
</div>
</div>
@endsection
