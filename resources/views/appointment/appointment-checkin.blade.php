@extends('layouts.second-master')

@section('title', 'Check In')

@section('content')
<!-- Patient Details -->
<h1>Check In</h1>
<div class="panel panel-default">
  <div class="panel-body">
    <div class="well well-sm">
    @if(isset($appoint['last_name']))
    <h4><label>Appointment</label></h4>
    <h5><label>Appointment Confirmed please take a seat in the waiting room.</label></h5>
    <h5><label>Appointment Time: </label>
    <p>{{@$appoint['time']}}</p></h5>

    <h5><label>Patient Name: </label>
    <p>{{@$appoint['patient_name']}} {{@$appoint['patient_last_name']}}</p></h5>

    <h5><label>Doctor Name: </label>
    <p>{{@$appoint['name']}} {{@$appoint['last_name']}}</p></h5>
    @else
    <h4><label>{{@$appoint['msg']}}</label></h4>
    @endif
    </div>
  </div>

  <input type="button" onclick="window.location.href='{{url('checkInForm')}}'" name="submitBtn" value="Back">
</div>
</div>
</div>
@endsection
