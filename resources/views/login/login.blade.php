@extends('layouts.second-master')

@section('title', 'Login')

@section('content')
  <!-- Login Form -->
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-body">
        @if (session('loginError'))
        <div>
          {{ session('loginError') }}
        </div>
        @endif
        <form action="{{url('login')}}" method="POST">
          {{ csrf_field() }}
          <h1>Login</h1>
          <div class="input-group">
            <label for="title">Email:</label>
            <input type="email" name="email" value="{{old('email')}}" id="email">
          </div>
          <div class="input-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
          </div>
          <div class="input-group">
            <input type="submit" name="submitBtn" value="Login">
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
