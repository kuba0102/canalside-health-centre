@extends('layouts.master')

@section('title', 'Login')

@section('content')
<h1>Main Menu</h1>
<div class="panel panel-default">
  <div class="panel-body">
    @if (session('loginError'))
    <div>
      {{ session('loginError') }}
    </div>
    @endif
  </div>
</div>
@endsection
