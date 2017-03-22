@extends('layouts.master')
@section('title', 'Patient details')
@section('content')

<!-- Patient Details -->
<h1>Patient Details</h1>
<div class="panel panel-default">
  <div class="panel-body">
    <ul class="list-group">
      <li class="list-group-item">ID: {{@$patient->id}}</li>
      <li class="list-group-item">Name: {{@$patient->name}}</li>
      <li class="list-group-item">Last Name: {{@$patient->last_name}}</li>
      <li class="list-group-item">Patient Gender: {{@$gender->name}}</li>
      <li class="list-group-item">Date Of Birth: {{@$patient->date_of_birth}}</li>
      <li class="list-group-item">Contact Number: {{@$patient->contact_number}}</li>
      <li class="list-group-item">Address: {{@$patient->address}}</li>
      <li class="list-group-item">Doctor: {{@$doctor->name}} {{@$doctor->last_name}}</li>
    </ul>

    <!--Extra Options-->
    <p><a href="{{url('updatePatientForm/'.$patient->id)}}"><input type="submit" name="submitBtn" value="Update Patient Details"></a></p>
    <p><a href="{{url('addAppointmentForm/'.$patient->id.'/'.$doctor->id)}}"><input type="submit" name="submitBtn" value="Add Appointment Details"></a></p>
    <form action="{{url('removePatient')}}" method="POST">
      {{ csrf_field() }}
      <label>Remove Patient</label>
      <input type='checkbox'required value='{{@$patient->id}}' id="patient" name='patient'/>
      <input type="submit" name="submitBtn" value="Delete Patient">
    </form>
  </div>
</div>

@endsection
