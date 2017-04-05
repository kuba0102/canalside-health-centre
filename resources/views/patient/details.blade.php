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
    @can('managePatient', App\ChcPatient::class)
    <p><input type="submit" name="submitBtn" value="Update Patient Details" onclick="window.location.href='{{url('updatePatientForm/'.$patient->id)}}'"></p>
    <p><input type="submit" name="submitBtn" value="Add Appointment Details" onclick="window.location.href='{{url('addAppointmentForm/'.$patient->id.'/'.$doctor->id)}}'"></p>

    <form action="{{url('removePatient')}}" method="POST">
      {{ csrf_field() }}
      <label>Remove Patient</label>
      <input type='checkbox'required value='{{@$patient->id}}' id="patient" name='patient'/>
      <input type="submit" class="tbn btn-danger btn-md" name="submitBtn" value="Delete Patient">
    </form>
    @endcan
    <!-- Appointments table -->
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
          @foreach(@$appointments as $appoint)
          <tr>
            <td>{{@$appoint->time}}</td>
            <td>{{@$appoint->date}}</td>
            <td>{{@$appoint->name}} {{@$appoint->last_name}} </td>
            <td>
              @if($appoint->status_id == 1)
              <span class="label label-success">Attended</span>
              @else
              <span class="label label-warning">Not Attended</span>
              <input type="button" onclick="window.location.href='{{url('checkIn/'.@$appoint->id.'/'.@$appoint->patient_id)}}'" name="noteBtn" class="btn btn-success btn-sm" value="Check In">
              @endif
            </td>
            @can('managePatient', App\ChcPatient::class)
            <td><input type="button" onclick="window.location.href='{{url('appointmentDetails/'.$appoint->id)}}'" name="detalsBtn" class="btn btn-success btn-sm" value="Appointment Details"></td>
            @endcan
            <td><input type="button" onclick="window.location.href='{{url('appointmentNote/'.@$appoint->id)}}'" name="noteBtn" class="btn btn-success btn-sm" value="View Note / Prescription"></td>
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
