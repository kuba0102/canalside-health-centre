@extends('layouts.master')

@section('title', 'All Members')

@section('content')
<h1>View All Patients</h1>
<div class="panel panel-default">
  <div class="panel-body">
    @foreach ($patients as $patient)
    <p>
      <a href="{{url('details/'.$patient->id)}}">{{$patient->id}}  {{$patient->name}}  {{$patient->last_name}}</a>
    </p>
    @endforeach
  </div>
</div>
@endsection
