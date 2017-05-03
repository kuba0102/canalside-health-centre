@php
// variables for date picker
$dayCount = 1;
$monthCount = 1;
$yearCount = date('Y');
@endphp

@extends('layouts.master')

@section('title', 'Add Note or Prescription')

@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<!-- Add note or prescription form -->
<h1>Add Appointment Note or Prescription</h1>
<div class="panel panel-default">
  <div class="panel-body">
    <div class="well well-sm">
      <h3><span class="label label-primary">Patient Details</span></h3>
      <form action="{{url('addAppointmentNote')}}" method="POST">
        {{ csrf_field() }}
        <a href="{{url('details/'.$patient->id)}}">
          <input type="text" name="patientName" value="{{@$patient->name}} {{@$patient->last_name}}" disabled/>
        </a>

        <h3><span class="label label-primary">Add Appointment Note</span></h3>
        <textarea class="form-control" name="note" id="note" rows="5">{{@$appointDetails->notes}}</textarea>
        <h3><span class="label label-primary">Add Appointment Prescription</span></h3>
        <textarea class="form-control" name="prescription" id="prescription" rows="3">{{@$appointDetails->prescription}}</textarea>
        <input type="hidden" name="patientId" value="{{@$patient->id}}">
        <input type="hidden" name="isNoteEmpty" value="{{@$isNoteEmpty}}">
        <input type="hidden" name="appintNoteId" value="{{@$appointDetails->id}}">
        <input type="hidden" name="appointId" value="{{@$appointment->id}}">
        <input type="hidden" name="doctorId" value="{{@$appointment->doctor_id}}">
        <input type="submit" name="submitBtn" value="Submit">
      </form>

      <input type="button" name="cancleBtn" value="Cancle" onclick="window.location.href='{{url('home')}}'">
    </div>
  </div>
</div>
@endsection
