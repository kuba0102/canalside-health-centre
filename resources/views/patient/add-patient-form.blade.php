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
        <input value="{{ old('name') }}" type="text" name="name" class="form-control" placeholder="Name" aria-describedby="basic-addon1">
      </div>
      <!-- Last name filed -->
      <div class="input-group">
        <span class="input-group-addon" id="lastName"></span>
        <input value="{{ old('lastName') }}" type="text" name="lastName" class="form-control" placeholder="Last Name" aria-describedby="basic-addon1">
      </div>
      <!-- Contact number filed -->
      <div class="input-group">
        <span class="input-group-addon" id="mbNum"></span>
        <input value="{{ old('mbNum') }}" type="number" name="mbNum" class="form-control" placeholder="Mobile Number" aria-describedby="basic-addon1">
      </div>
      <!-- Address filed -->
      <div class="input-group">
        <span class="input-group-addon" id="address"></span>
        <input value="{{ old('address') }}" type="text" name="address" class="form-control" placeholder="Address" aria-describedby="basic-addon1">
      </div>
      <div class="well well-sm">
        <!-- Gender radio buttons -->
        <h4><span class="label label-primary">Gender</span></h4>
        <div class="input-group">
          <input type="radio" name="gender" value="1">
          <label>Male</label><br>
          <input type="radio" name="gender" value="2">
          <label>Female</label>
        </div>
        <!-- Docotr selection list -->
        <h4><span class="label label-primary">Doctor</span></h4>
        <div class="input-group">
          <select required id="docId" name="docId">
            <option>Pick Doctor</option>
            @foreach ($doctors as $doctor)
            <option value="{{@$doctor->id}}">{{@$doctor->name}} {{@$doctor->last_name}}</option>
            @endforeach
          </select>
        </div>
        <!-- Date of birth selection lists -->
        <h4><span class="label label-primary">Date Of Birth</span></h4>
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
      </div>
      <!-- Submit button -->
      <input type="submit" name="submitBtn" value="Add Patient">
    </form>
  </div>
</div>
@endsection
