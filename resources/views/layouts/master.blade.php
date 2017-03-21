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

  <div class="container">
    <div class="panel panel-default">
      <div class="panel-body">
        <ul class="nav nav-pills">
          <li role="presentation"><a href="{{url('home')}}">Home</a></li>
          @can('create', App\ChcPatient::class)
          <li><a href="{{url('allPatients')}}">View All Patients</a></li>
          <li><a href="{{url('addPatientForm')}}">Add Patient</a></li>
          @endcan
          <li role="presentation"><a href="{{url('logout')}}">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
  @show

  <div class="container">
    <div>Logged in as : {{Auth::user()->name}} {{Auth::user()->last_name}}</div>
    @yield('content')
  </div>
</body>
</html>
