@extends('layouts.master')

@section('title', 'Login')

@section('content')
@if (session('loginError'))
    <div>
        {{ session('loginError') }}
    </div>
@endif
<form action="{{url('login')}}" method="POST">
{{ csrf_field() }}
<h1>Login</h1>
<div>
<label for="title">Email:</label>
<input type="email" name="email" value="{{old('email')}}" id="email">
</div>
<div>
<label for="password">Password:</label>
<input type="password" name="password" id="password">
</div>
<div>
<input type="submit" name="submitBtn" value="Login">
</div>
</form>
@endsection
