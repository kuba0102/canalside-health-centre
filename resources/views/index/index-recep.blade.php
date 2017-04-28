@extends('layouts.master')

@section('title', 'Home')

@section('content')
<h1>Main Menu</h1>
<div class="panel panel-default">
  <div class="panel-body">
    @if (session('loginError'))
    <div>
      {{ session('loginError') }}
    </div>
    @endif

    <h1> Receptionist </h1>
    <div class="well well-sm">
      <h4><label>Useful Information</label></h4>
      <h5><label>Contact Details:</label></h5>
      <ul class="list-group">
        <li class="list-group-item">Telephone: 01274 667323</li>
        <li class="list-group-item">Fax:	02244 512788 </li>
      </ul>
      <h5><label>Opening Times:</label></h5>
      <ul class="list-group">
        <li class="list-group-item">Monday: 7am - 8pm</li>
        <li class="list-group-item">Tuesday to Friday: 8am - 6.30pm</li>
      </ul>
    </div>
    @include('layouts/gallery')
  </div>
</div>
@endsection
