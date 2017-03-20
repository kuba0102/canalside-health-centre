@extends('layouts.master')

@section('title', 'Add New Patient')

@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<h1>Add New Patient</h1>
<div class="panel panel-default">
  <div class="panel-body">
    <form action="{{url('addPatient')}}" method="POST">
      {{ csrf_field() }}
      <div class="input-group">
        <span class="input-group-addon" id="name"></span>
        <input type="text" name="name" class="form-control" placeholder="Name" aria-describedby="basic-addon1">
      </div>
      <div class="input-group">
        <span class="input-group-addon" id="lastName"></span>
        <input type="text" name="lastName" class="form-control" placeholder="Last Name" aria-describedby="basic-addon1">
      </div>
      <div class="input-group">
        <span class="input-group-addon" id="mbNum"></span>
        <input type="number" name="mbNum" class="form-control" placeholder="Mobile Number" aria-describedby="basic-addon1">
      </div>
      <div class="input-group">
        <span class="input-group-addon" id="address"></span>
        <input type="text" name="address" class="form-control" placeholder="Address" aria-describedby="basic-addon1">
      </div>
      <div class="input-group">
        <span class="input-group-addon" id="docId"></span>
        <input type="number" name="docId" class="form-control" placeholder="Doctor Id" aria-describedby="basic-addon1">
      </div>
      <label>Date Of Birth</label>
      <div class="input-group">

        <select name="DOBMonth">
          <option> - Month - </option>
          <option value="01">January</option>
          <option value="02">Febuary</option>
          <option value="03">March</option>
          <option value="04">April</option>
          <option value="05">May</option>
          <option value="06">June</option>
          <option value="07">July</option>
          <option value="08">August</option>
          <option value="09">September</option>
          <option value="10">October</option>
          <option value="11">November</option>
          <option value="12">December</option>
        </select>

        <select name="DOBDay">
          <option> - Day - </option>
          <option value="01">1</option>
          <option value="02">2</option>
          <option value="03">3</option>
          <option value="04">4</option>
          <option value="05">5</option>
          <option value="06">6</option>
          <option value="07">7</option>
          <option value="08">8</option>
          <option value="09">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="31">31</option>
        </select>

        <select name="DOBYear">
          <option> - Year - </option>
          <option value="1993">1993</option>
          <option value="1992">1992</option>
          <option value="1991">1991</option>
          <option value="1990">1990</option>
          <option value="1989">1989</option>
          <option value="1988">1988</option>
          <option value="1987">1987</option>
          <option value="1986">1986</option>
          <option value="1985">1985</option>
          <option value="1984">1984</option>
          <option value="1983">1983</option>
          <option value="1982">1982</option>
          <option value="1981">1981</option>
          <option value="1980">1980</option>
          <option value="1979">1979</option>
          <option value="1978">1978</option>
          <option value="1977">1977</option>
          <option value="1976">1976</option>
          <option value="1975">1975</option>
          <option value="1974">1974</option>
          <option value="1973">1973</option>
          <option value="1972">1972</option>
          <option value="1971">1971</option>
          <option value="1970">1970</option>
          <option value="1969">1969</option>
          <option value="1968">1968</option>
          <option value="1967">1967</option>
          <option value="1966">1966</option>
          <option value="1965">1965</option>
          <option value="1964">1964</option>
          <option value="1963">1963</option>
          <option value="1962">1962</option>
          <option value="1961">1961</option>
          <option value="1960">1960</option>
          <option value="1959">1959</option>
          <option value="1958">1958</option>
          <option value="1957">1957</option>
          <option value="1956">1956</option>
          <option value="1955">1955</option>
          <option value="1954">1954</option>
          <option value="1953">1953</option>
          <option value="1952">1952</option>
          <option value="1951">1951</option>
          <option value="1950">1950</option>
          <option value="1949">1949</option>
          <option value="1948">1948</option>
          <option value="1947">1947</option>
        </select>
      </div>

      <input type="submit" name="submitBtn" value="Add Patient">
    </form>
  </div>
</div>
@endsection
