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
            <h1 style="font-family: Candara">Doctor Profile</h1>
            <div class="center">
                <img src="{{ asset('storage/images/doctor_profile.png') }}" width="200" height="200">
                <table class="highlight">
                    <tr>
                        <th>Doctor Name</th>
                        <td>{{$doctor->docFirstName}} {{$doctor->docLastName}}</td>
                    </tr>
                    <tr>
                        <th>Email Address</th>
                        <td>{{$doctor->docEmail}}</td>
                    </tr>
                    <tr>
                        <th>Doctor Specialist</th>
                        <td>{{$doctor->docSpecialist}}</td>
                    </tr>
                </table>

            <br><br>
            <a href="{{ url('edit-doctor' . '/' . $doctor->id) }}" class="waves-effect waves-light btn-large orange">edit profile details</a>
            </div>
        </div>
    </div>
</div>

@endsection