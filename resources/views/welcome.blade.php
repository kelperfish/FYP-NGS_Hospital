@extends('layouts.app')

@section('content')

<section class="slider">
  <ul class="slides">
    <li>
      <img src="{{ asset('storage/images/banner.jpg') }}"> <!-- slider -->
      <div class="caption center-align">
        <br /><br />
        @if(session()->has('loginID'))
        <h1 style="font-family: Candara">Welcome back, Doctor</h1>
        @elseif(session()->has('loginEmployeeID'))
        <h1 style="font-family: Candara">Welcome back, Pharmacist</h1>
        @else
        <h1 style="font-family: Candara">Welcome</h1>
        @endif

        <h5 class="light grey-text text-lighten-3">NGS Hospital Adminstration Panel</h5>
        <br />

        @if(session()->has('loginID'))
        <a class="white black-text waves-effect waves-light btn-large" href="{{url('employees')}}">Manage employees</a>
        <a class="white black-text waves-effect waves-light btn-large" href="{{url('medicine')}}">Check medicine list</a>
        <a class="white black-text waves-effect waves-light btn-large" href="{{url('diseases')}}">Check diseases list</a>
        <br><br>
        <a class="white black-text waves-effect waves-light btn-large" href="{{url('allTasks')}}">Manage tasks</a>
        <a class="white black-text waves-effect waves-light btn-large" href="{{url('doctor-dashboard')}}">doctor profile</a>
        @elseif(session()->has('loginEmployeeID'))
        <a class="white black-text waves-effect waves-light btn-large" href="{{url('medicine')}}">manage medicine</a>
        <a class="white black-text waves-effect waves-light btn-large" href="{{url('diseases')}}">manage diseases list</a>
        <a class="white black-text waves-effect waves-light btn-large" href="{{url('employee-dashboard')}}">pharmacist profile</a>
        @else
        <a class="white black-text waves-effect waves-light btn-large" href="{{url('login')}}">Login as doctor</a>
        <a class="white black-text waves-effect waves-light btn-large" href="{{url('loginEmployee')}}">Login as Pharmacist</a>
        @endif
      </div>
    </li>
  </ul>
</section>

@endsection