@extends('layouts.master')

@section('title', 'Login')

@section('content')
@if (session('loginError'))
    <div>
        {{ session('loginError') }}
    </div>
@endif
<h1> Error </h1>
@endsection
