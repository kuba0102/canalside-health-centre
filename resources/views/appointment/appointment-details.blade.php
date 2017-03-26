@extends('layouts.master')
@section('title', 'Appointment Details')
@section('content')

<!-- Patient Details -->
<h1>Appointment Details</h1>
<div class="panel panel-default">
  <div class="panel-body">
    <div class="well well-sm">
      <h4><label>Doctor Name</label></h4>
      <p>{{@$doc->name}} {{@$doc->last_name}}</p>
    </div>
    <div class="well well-sm">
      <h4><label>Patient Details</label></h4>
      <p>Unique ID: {{@$patient->id}}</p>
      <p>Name: {{@$patient->name}} {{@$patient->last_name}}</p>
    </div>

    <div class="well well-sm">
      <h4><label>Appointment Date\Time</label></h4>
      <p>{{@$appoint->date}}</p>
      <p>{{@$appoint->time}}</p>
    </div>
    <input type="button" onclick="window.location.href='{{url('details/'.$patient->id)}}'" name="submitBtn" value="Continue">
    <input type="button" onclick="window.print();" name="submitBtn" value="Print Appointment">
    @can('managePatient', App\ChcPatient::class)
    <form action="{{url('cancelAppoitnment')}}" method="POST">
      {{ csrf_field() }}
      <br><input type="radio" id="appointId" name="appointId" value="{{@$appoint->id}}" required>
      <label>Cancel Appointment?</label>
      <input type="submit" class="tbn btn-danger btn-md" name="submitBtn" value="Cancel Appointment">
    </form>
    @endcan

  </div>
</div>
</div>
@endsection
