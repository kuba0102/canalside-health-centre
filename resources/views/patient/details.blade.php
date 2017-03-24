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
    <p><input type="submit" name="submitBtn" value="Update Patient Details" onclick="window.location.href='{{url('updatePatientForm/'.$patient->id)}}'"></p>
    <p><input type="submit" name="submitBtn" value="Add Appointment Details" onclick="window.location.href='{{url('addAppointmentForm/'.$patient->id.'/'.$doctor->id)}}'"></p>
    <form action="{{url('removePatient')}}" method="POST">
      {{ csrf_field() }}
      <label>Remove Patient</label>
      <input type='checkbox'required value='{{@$patient->id}}' id="patient" name='patient'/>
      <input type="submit" class="tbn btn-danger btn-md" name="submitBtn" value="Delete Patient">
    </form>
    <h3><span class="label label-primary">Appointments</span></h3>
    <div class="well well-sm">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Time</th>
            <th>Date</th>
            <th>Doctor Name</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach(@$appointments as $appoints)
          <tr>
            <td>{{@$appoints->time}}</td>
            <td>{{@$appoints->date}}</td>
            <td>{{@$appoints->name}} {{@$appoints->last_name}} </td>
            <td>
              @if($appoints->status_id == 1)
              <span class="label label-success">Attended</span>
              @else
              <span class="label label-warning">Not Attended</span>
              @endif
            </td>
            <td><a href="{{url('appointmentDetails/'.$appoints->id)}}"><input type="button" class="btn btn-success btn-sm" value="View Details"></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <input type="button" onclick="window.location.href='{{url('appointmentNotes/'.@$patient->id)}}'" 
      name="notesBtn" class="btn btn-success btn-sm" value="View Notes / Prescriptions">
    </div>
  </div>
</div>

@endsection
