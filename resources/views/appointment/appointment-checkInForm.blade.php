@extends('layouts.second-master')

@section('title', 'Check In')

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
<!-- Check in Form -->
<h1>Check In</h1>
<div class="panel panel-default">
  <div class="panel-body">
    <div class="well well-sm">
      <form action="{{url('checkIn')}}" method="POST">
        {{ csrf_field() }}
        <div class="input-group">
          <label for="title">Patient Id:</label><br>
          <input type="numeric" name="patientId" id="patientId" required>
        </div>
        <br><input type="submit" name="submitBtn" value="Check In">
      </form>
    </div>
    <label> OR </label>
    <div class="well well-sm">
      <form action="{{url('checkIn')}}" method="POST">
        {{ csrf_field() }}
        <div class="input-group">
          <label for="title">Date of Birth:</label><br>
          <input type="date" name="patientDob" id="patientDob" required>
        </div>
        <br><input type="submit" name="submitBtn" value="Check In">
      </form>
    </div>
  </div>
</div>
@endsection
