<html>
<head>
  <title>@yield('title')</title>
  <link href="{{asset('/css/app.css')}}" rel="stylesheet" type="text/css">

</head>
<body>
  @section('header')
  <div class="container">
    <div class="jumbotron">
      <div class="col-lg-12 col-lg-offset-0 text-center">
      <h1>Canalside Health Centre</h1>
    </div>
      @include('layouts/gallery')
    </div>
  </div>
  <!-- Navigation -->
  <div class="container">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="{{url('login')}}">| Canalside Health Centre |</a>
        </div>
        <ul class="nav navbar-nav">
          <li role="presentation"><a href="{{url('login')}}">Staff Login</a></li>
          <li role="presentation"><a href="{{url('checkInForm')}}">Check In</a></li>
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
