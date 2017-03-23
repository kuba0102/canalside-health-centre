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
  <!-- Navigation -->
  <div class="container">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="{{url('home')}}">| Canalside Health Centre |</a>
        </div>
        <ul class="nav navbar-nav">
          <li role="presentation"><a href="{{url('home')}}">Home</a></li>
          @can('create', App\ChcPatient::class)
          <li><a href="{{url('allPatients')}}">View All Patients</a></li>
          <li><a href="{{url('addPatientForm')}}">Add Patient</a></li>
          @endcan
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li role="presentation"><a href="#">Logged in as: {{Auth::user()->name}} {{Auth::user()->last_name}}</a></li>
          <li role="presentation"><a href="{{url('logout')}}">Logout</a></li>
        </ul>
      </div>
    </nav>
  </div>
  @show
  <!-- Login User info -->
  <div class="container">
    <!-- Content of the page -->
    @yield('content')
  </div>
</body>
</html>
