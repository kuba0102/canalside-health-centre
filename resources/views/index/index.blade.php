@extends('layouts.master')

@section('title', 'Login')

@section('content')
@if (session('loginError'))
    <div>
        {{ session('loginError') }}
    </div>
@endif

@endsection
