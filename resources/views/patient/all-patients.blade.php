@extends('layouts.master')

@section('title', 'All Members')

@section('content')
<h1>View All Members</h1>
<div class="panel panel-default">
  <div class="panel-body">
    @foreach ($members as $member)
    <p>
      <a href="{{url('details/'.$member->member_id)}}">{{$member->member_id}}  {{$member->member_name}}  {{$member->member_last_name}}</a>
    </p>
    @endforeach
  </div>
</div>
@endsection
