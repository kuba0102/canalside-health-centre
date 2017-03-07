@extends('layouts.master')
@section('title', 'Member details')
@section('content')
<h1>Member Details</h1>

<div class="panel panel-default">
  <div class="panel-body">
    <ul class="list-group">
      <li class="list-group-item">ID: {{$member->member_id}}</li>
      <li class="list-group-item">Name: {{$member->member_name}}</li>
      <li class="list-group-item">Last Name: {{$member->member_last_name}}</li>
      <li class="list-group-item">Joined Date: {{$member->member_date_joined}}</li>
      <li class="list-group-item">Contact Number: {{$member->member_mobile_number}}</li>

      <li class="list-group-item">Wins: {{@$league[0]['wins']}}</li>
      <li class="list-group-item">Losses: {{@$league[1]['losses']}}</li>
      <li class="list-group-item">Highest Score: {{@$league[2]['higScore']}}</li>
      <li class="list-group-item">Highest Against: {{@$topAgainst[0]->member_name}} {{@$topAgainst[0]->member_last_name}}</li>
      <li class="list-group-item">AVG Score: {{round(@$league[2]['avgScore'])}}</li>
    </ul>
    <form action="{{url('removeMember')}}" method="POST">
      {{ csrf_field() }}
      <label>Remove Member</label>
      <input type='checkbox' value='{{$member->member_id}}' id="member" name='member'/>
      <input type="submit" name="submitBtn" value="Delete Member">
    </form>
  </div>
</div>

@endsection
