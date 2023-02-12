@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    @if(session()->has('loginID'))
    <a href="{{url('employees')}}" style="font-family: Candara; font-size: 35px; color:black">
        <i class="material-icons">arrow_back</i>Back to Employees List
    </a>
    @elseif(session()->has('loginEmployeeID'))
    <a href="{{url('employee-dashboard')}}" style="font-family: Candara; font-size: 35px; color:black">
        <i class="material-icons">arrow_back</i>Back Pharmacist Profile
    </a>
    @endif
</div>

<div class="center-align">
    <img src="{{ asset('storage/images/task_image.png') }}" width="400" height="300">
    @if(session()->has('loginID'))
    <h5>This employee have no new tasks</h5>
    <p>When available, you'll see them here.</p>
    @elseif(session()->has('loginEmployeeID'))
    <h5>You have no new tasks</h5>
    <p>When you have new tasks, you'll see them here.</p>
    @endif   
    <br />
    @if(session()->has('loginID'))
    <a class="waves-effect waves-light orange darken-4 btn" href="{{ url('add-new-task' . '/' . $passEmpID) }}"><i class="material-icons left">library_add</i>assign task here</a>
    @endif
    <br /><br /><br />
</div>

@endsection