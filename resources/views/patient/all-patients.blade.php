@extends('layouts.master')

@section('title', 'All Members')

@section('content')
<h1>View All Patients</h1>
<div class="panel panel-default">
  <div class="panel-body">
    <div class="well well-sm">
      <form action="{{url('allPatients')}}" method="POST">
        {{ csrf_field() }}
        <div class="input-group">
          <h3><span class="label label-primary">Search Patient by Name / Id / Address</span></h3>
          <input type="text" id="search" name="search" class="form-control" aria-describedby="basic-addon1" value="{{@$searchTerm}}">
          <input type="submit" name="submitBtn" value="Search">
        </div>
      </form>
    </div>
    <div class="well well-sm">
      <div class="list-group">
      <h3><span class="label label-primary">Patient List</span></h3>
      @foreach ($patients as $patient)
        <button onclick="window.location.href=`{{url('details/'.$patient->id)}}`" type="button" class="list-group-item">{{$patient->id}}  {{$patient->name}}  {{$patient->last_name}}</button>
      @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
