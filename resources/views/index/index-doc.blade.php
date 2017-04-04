@extends('layouts.master')

@section('title', 'Home')

@section('content')
<h1>Doctors Appoitnments</h1>
<div class="panel panel-default">
  <div class="panel-body">
    @if (session('loginError'))
    <div>
      {{ session('loginError') }}
    </div>
    @endif
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Time</th>
          <th>Date</th>
          <th>Patient Name</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach(@$appointments as $appoint)
        <tr>
          <td>{{@$appoint->time}}</td>
          <td>{{@$appoint->date}}</td>
          <td><a href="{{url('details/'.$appoint->patient_id)}}">{{@$appoint->patient_name}} {{@$appoint->patient_last_name}}</a></td>
          <td>
            @if($appoint->status_id == 1)
            <span class="label label-success">Attended</span>
            @else
            <span class="label label-warning">Not Attended</span>
            @endif
          </td>
          <td>
            <form action="{{url('appointmentNoteForm')}}" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="appointId" value="{{@$appoint->id}}"/>
              <input type="submit" name="submitBtn" class="btn btn-success btn-sm" value="Add Note / Prescription">
              <input type="button" onclick="window.location.href='{{url('appointmentNotes/'.@$appoint->patient_id)}}'" name="notesBtn" class="btn btn-success btn-sm" value="View Notes / Prescriptions">
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
