<html>
<head>
  <title>@yield('title')</title>
  <link href="{{asset('/css/app.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
  @section('header')
  <div class="container">
    <div class="jumbotron">
      <h1>Canalside Health Centre</h1>
    </div>
  </div>
  <div>Logged in as : {{Auth::user()->name}}</div>
<div class="container">
  <ul class="nav nav-pills">
    <li role="presentation"><a href="{{url('logout')}}">Logout</a></li>
    <!-- @if (Auth::user()->pos_id == 1)  @endif-->
    @can('create', App\ChcPatient::class)
        <li><a href="{{url('addPatientForm')}}">Add Patient</a></li>
        <li><a href="{{url('viewAllPatints')}}">View All Patients</a></li>
    @endcan
    <li role="presentation"><a href="https://github.com/kuba0102/elder-studios-scrabble-system-laravel/">GitHub Repository</a></li>
  </ul>
</div>
  @show

  <div class="container">

    @yield('content')
  </div>
</body>
</html>
