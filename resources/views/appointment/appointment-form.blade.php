@php // variables for date picker
$dayCount = 1;
$monthCount = 1;
$yearCount = date('Y');
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
    <div class="well well-sm">
      <form action="{{url('addAppointmentForm/'.$patient->id.'/'.$patient->doctor_id)}}" method="GET">
        {{ csrf_field() }}
        <!-- Gender radio buttons -->
        <h3><span class="label label-primary">Doctor Gender</span></h3>
        <div class="input-group">
          <input type="radio" name="gender" value="1">
          <label>Male</label><br>
          <input type="radio" name="gender" value="2">
          <label>Female</label><br>
          <input type="radio" name="gender" value="3" checked>
          <label>Both</label>
        </div>

        <!-- Other Doctors radio buttons -->
        <h3><span class="label label-primary">Other Doctors</span></h3>
        <div class="input-group">
          <input type="radio" name="otherDoctors" value="0" checked>
          <label>Patient Doctor</label><br>
          <input type="radio" name="otherDoctors" value="1">
          <label>Other Doctors</label>
        </div>

        <!-- Date of birth selection lists -->
        <h3><span class="label label-primary">Appointment Date</span></h3>
        <div class="input-group">
          <select required name="day">
            <option value="{{date('d')}}">{{date('d')}}</option>
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

          <select required name="month">
            <option value="{{date('m')}}">{{date('m')}}</option>
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

          <select required name="year">
            <option value="{{date('Y')}}">{{date('Y')}}</option>
            <option> - Year - </option>
            @while($yearCount <= date('Y')+4)
            <option value="{{$yearCount}}">{{$yearCount}}</option>
            {{$yearCount++}}
            @endwhile
          </select>
        </div>

        <!-- Submit button -->
        <br><input type="submit" name="submitBtn" value="Find Appointment">
      </form>
    </div>

    <div class="well well-sm">
      <h4><span class="label label-primary">Available Appointments</span></h4>
      <div class="input-group">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Appointment</th>
              <th>Time</th>
              <th>Doctor Name</th>
            </tr>
          </thead>
          <tbody>
            @foreach($appoitnments as $appoints)
            <tr>
              <form action="{{url('addAppointment')}}" method="POST">
                {{ csrf_field() }}
                <td><input type="hidden" name="patientId" value="{{@$patient->id}}">
                  <input type="hidden" name="docId" value="{{@$appoints['docId']}}"/>
                  <input type="hidden" name="date" value="{{@$appoints['date']}}"/>
                  <input type="hidden" name="hour" value="{{@$appoints['hour']}}"/>
                  <input type="hidden" name="min" value="{{@$appoints['min']}}"/>
                  <input type="hidden" name="second" value="{{@$appoints['second']}}"/>
                  <!-- Submit button -->
                  <input type="submit" name="submitBtn" value="Add Appointment">
                </td>
                <td>{{@$appoints['hour']}}:{{sprintf("%02d",@$appoints['min'])}}</td>
                <td>{{@$appoints['name']}} {{@$appoints['lastName']}} </td>
              </form>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <a href="{{url('home')}}"><input type="button" name="submitBtn" value="Cancle"></a>
    </div>
  </div>
</div>
@endsection
