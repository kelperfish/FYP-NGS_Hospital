@extends('layouts.app')

@section('content')

<style>
    table{
        font-size: large;
        width: 40%;
        margin-left: auto;
        margin-right: auto;
    }
    td{
        text-align: right;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
            <h1 style="font-family: Candara">Pharmacist Profile</h1>
            <div class="center">
                <img src="{{ asset('storage/images/profile.png') }}" width="200" height="200">
                <table class="highlight">
                    <tr>
                        <th>Pharmacist Name</th>
                        <td>{{$employee->employeeName}}</td>
                    </tr>
                    <tr>
                        <th>Mobile Number</th>
                        <td>{{$employee->employeeMobile}}</td>
                    </tr>
                    <tr>
                        <th>Home Address</th>
                        <td>{{$employee->employeeAddress}}</td>
                    </tr>
                    <tr>
                        <th>Email Address</th>
                        <td>{{$employee->employeeEmail}}</td>
                    </tr>
                </table>

            <br><br>
            <a href="{{ url('edit-employee' . '/' . $employee->id) }}" class="waves-effect waves-light btn-large yellow darken-4">edit profile details</a>
            <a href="{{ url('employee-tasks' . '/' . $employee->employeeID) }}" class="waves-effect waves-light btn-large amber darken-4">view/manage tasks</a>
            <a href="{{ url('edit-employee-password' . '/' . $employee->id) }}" class="waves-effect waves-light btn-large orange darken-4">change password</a>
            </div>
        </div>
    </div>
</div>

@endsection