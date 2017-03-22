@php // variables for date picker
$dayCount = 1;
$monthCount = 1;
$yearCount = 1900;
@endphp

@extends('layouts.master')

@section('title', 'Add New Appointment')

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
<!-- Add appointment form -->
<h1>Add New Appointment</h1>
<div class="panel panel-default">
  <div class="panel-body">
    <form action="{{url('addPatient')}}" method="POST">
      {{ csrf_field() }}

      <!-- Gender radio buttons
      <label>Gender: </label>
      <div class="input-group">
      <label>Male</label>
      <input type="radio" name="gender" value="1">
      <label>Female</label>
      <input type="radio" name="gender" value="2">
    </div>
  -->
  <!-- Date of birth selection lists -->
  <label>Date Of Birth: </label>
  <div class="input-group">
    <select required name="DOBDay">
      <option> - Day - </option>
      @while($dayCount <= 31)
      @if($dayCount <= 9)
      <option value="0{{$dayCount}}">0{{$dayCount}}</option>
      @else
      <option value="{{$dayCount}}">{{$dayCount}}</option>
      @endif
      {{$dayCount++}}
      @endwhile
    </select>

    <select required name="DOBMonth">
      <option> - Month - </option>
      @while($monthCount <= 12)
      @if($monthCount <= 9)
      <option value="0{{$monthCount}}">0{{$monthCount}}</option>
      @else
      <option value="{{$monthCount}}">{{$monthCount}}</option>
      @endif
      {{$monthCount++}}
      @endwhile
    </select>

    <select required name="DOBYear">
      <option> - Year - </option>
      @while($yearCount <= date('Y'))
      <option value="{{$yearCount}}">{{$yearCount}}</option>
      {{$yearCount++}}
      @endwhile
    </select>
  </div>
  <!-- Submit button -->
  <input type="submit" name="submitBtn" value="Find Appointment">
</form>

<label>Appointments Avaiable: </label>
<form action="{{url('addPatient')}}" method="POST">
  <div class="input-group">
    @foreach($appoitnments as $appoints)
    <input type="hidden" name="docId" value="{{@$appoints['docId']}}"/>
    <input type="hidden" name="date" value="{{@$appoints['date']}}"/>
    <input type="hidden" name="time" value="{{@$appoints['time']}}"/>
    <div class="input-group">
      <input type="radio" name="patientId" value="{{@$patient->id}}" required>
      <label>{{@$appoints['name']}} {{@$appoints['lastName']}} {{@$appoints['time']}}</label>
    </div>
    @endforeach
  </div>
  <!-- Submit button -->
  <input type="submit" name="submitBtn" value="Add Appointment">
</form>


</div>
</div>
@endsection
