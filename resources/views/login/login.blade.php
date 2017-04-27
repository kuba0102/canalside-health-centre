@extends('layouts.second-master')

@section('title', 'Login')

@section('content')
<!-- Login Form -->
<div class="container">
  <div class="panel panel-default">
    <div class="panel-body">

      @if (session('loginError'))
      <div class="alert alert-danger" role="alert">
        <div>
          {{ session('loginError') }}
        </div>
      </div>
      @endif


      <form action="{{url('login')}}" method="POST">
        {{ csrf_field() }}
        <div class="col-lg-3 col-lg-offset-4 text-center">
          <h1>Login</h1>
          <div class="well well-sm col-lg-offset-3">
            <div class="input-group">
              <label for="title">Email:</label><br>
              <input type="email" name="email" value="{{old('email')}}" id="email">
            </div>
            <div class="input-group">
              <label for="password">Password:</label><br>
              <input type="password" name="password" id="password">
            </div>
            <div class="input-group"><br>
              <input type="submit" name="submitBtn" value="Login">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
