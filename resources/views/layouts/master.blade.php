<html>
<head>
  <title>@yield('title')</title>
  <link href="{{asset('/css/app.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
  @section('header')
  <div class="container">
    <div class="jumbotron">
      <h1>Elder Studios Scrabble System</h1>
      <p>A Scrabble club requires a system to store members’ information and provide leaderboard for members to track their league progress.</p>
    </div>
  </div>
<div class="container">
  <ul class="nav nav-pills">
    <li role="presentation"><a href="{{url('all')}}">View All Members</a></li>
    <li role="presentation"><a href="{{url('getTopTen')}}">Top Ten</a></li>
    <li role="presentation"><a href="{{url('addMemberForm')}}">Add Member</a></li>
    <li role="presentation"><a href="{{url('addResultForm')}}">Add New Results</a></li>
    <li role="presentation"><a href="https://github.com/kuba0102/elder-studios-scrabble-system-laravel/">GitHub Repository</a></li>
  </ul>
</div>
  @show

  <div class="container">
    @yield('content')
  </div>
</body>
</html>
