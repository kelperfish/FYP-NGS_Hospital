@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
            <a href="{{url('employee-dashboard')}}" style="font-family: Candara; font-size: 35px; color:black">
                <i class="material-icons">arrow_back</i>Back to Pharmacist Profile
            </a>
            <h2 style="font-family: Candara">Edit Pharmacist Profile</h1>
                <br>
                <form action="{{ url('update-employee/' . $Employee->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @if(Session::has('success'))
                    <a>{{Session::get('success')}}</a>
                    @endif

                    @if(Session::has('fail'))
                    <a style="color: red;">{{Session::get('fail')}}</a>
                    @endif
                    <div class="form group">
                        <div class="input-field col s6">
                            <input value="{{$Employee->employeeName}}" placeholder="{{$Employee->employeeName}}" id="pharmacist_name" name="employeeName" type="text" class="validate">
                            <label for="pharmacist_name">Pharmacist Name</label>
                            <span class="helper-text" data-error="wrong" style="color: red;">@error ('employeeName') {{$message}} @enderror</span>
                        </div>

                        <div class="input-field col s6">
                            <input value="{{$Employee->employeeMobile}}" placeholder="{{$Employee->employeeMobile}}" id="pharmacist_mobile" name="employeeMobile" type="number" class="validate">
                            <label for="pharmacist_mobile">Mobile Number</label>
                            <span class="helper-text" data-error="wrong" style="color: red;">@error ('employeeMobile') {{$message}} @enderror</span>
                        </div>

                        <div class="input-field col s6">
                            <input value="{{$Employee->employeeAddress}}" placeholder="{{$Employee->employeeAddress}}" id="pharmacist_address" name="employeeAddress" type="text" class="validate">
                            <label for="pharmacist_address">Home Address</label>
                            <span class="helper-text" data-error="wrong" style="color: red;">@error ('employeeAddress') {{$message}} @enderror</span>
                        </div>

                        <div class="input-field col s6">
                            <input value="{{$Employee->employeeEmail}}" placeholder="{{$Employee->employeeEmail}}" id="pharmacist_email" name="employeeEmail" type="text" class="validate">
                            <label for="pharmacist_email">Email Address</label>
                            <span class="helper-text" data-error="wrong" style="color: red;">@error ('employeeEmail') {{$message}} @enderror</span>
                        </div>

                        <div class="center">
                            <button class="waves-effect waves-light orange btn-large" type="submit">submit</button>
                            <a class="waves-effect waves-light red btn-large" href="{{url('employee-dashboard')}}">cancel</a>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>

@endsection