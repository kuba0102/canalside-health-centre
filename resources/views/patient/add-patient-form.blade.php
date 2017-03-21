@php // variables for date of birth
$dayCount = 1;
$monthCount = 1;
$yearCount = 1900;
@endphp

@extends('layouts.master')

@section('title', 'Add New Patient')

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
<!-- Add patient form -->
<h1>Add New Patient</h1>
<div class="panel panel-default">
  <div class="panel-body">
    <form action="{{url('addPatient')}}" method="POST">
      {{ csrf_field() }}
      <!-- Name filed -->
      <div class="input-group">
        <span class="input-group-addon" id="name"></span>
        <input type="text" name="name" class="form-control" placeholder="Name" aria-describedby="basic-addon1">
      </div>
      <!-- Last name filed -->
      <div class="input-group">
        <span class="input-group-addon" id="lastName"></span>
        <input type="text" name="lastName" class="form-control" placeholder="Last Name" aria-describedby="basic-addon1">
      </div>
      <!-- Contact number filed -->
      <div class="input-group">
        <span class="input-group-addon" id="mbNum"></span>
        <input type="number" name="mbNum" class="form-control" placeholder="Mobile Number" aria-describedby="basic-addon1">
      </div>
      <!-- Address filed -->
      <div class="input-group">
        <span class="input-group-addon" id="address"></span>
        <input type="text" name="address" class="form-control" placeholder="Address" aria-describedby="basic-addon1">
      </div>
      <!-- Docotr selection list -->
      <div class="input-group">
        <label>Doctor: </label>
        <select required id="docId" name="docId">
          <option >Pick Doctor</option>
          @foreach ($doctors as $doctor)
          <option value="{{@$doctor->id}}">{{@$doctor->name}} {{@$doctor->last_name}}</option>
          @endforeach
        </select>
      </div>
      <!-- Date of birth selection lists -->
      <div class="input-group">
        <label>Date Of Birth: </label>
        <select required name="DOBDay">
          <option> - Day - </option>
          @while($dayCount <= 31)
          <option value="{{$dayCount}}">{{$dayCount}}</option>
          {{$dayCount++}}
          @endwhile
        </select>

        <select required name="DOBMonth">
          <option> - Month - </option>
          @while($monthCount <= 12)
          <option value="{{$monthCount}}">{{$monthCount}}</option>
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
      <input type="submit" name="submitBtn" value="Add Patient">
    </form>
  </div>
</div>
@endsection
