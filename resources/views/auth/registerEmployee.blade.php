@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
            <h1 style="font-family: Candara">Pharmacist Registration</h1>
            <form action="{{ route('register-employee' )}}" method="post">
                @csrf
                @if(Session::has('success'))
                    <a>{{Session::get('success')}}</a>
                @endif

                @if(Session::has('fail'))
                    <a style="color: red;">{{Session::get('fail')}}</a>
                @endif
                <div class="form group">
                    <div class="input-field">
                        <i class="material-icons prefix">person</i>
                        <input id="icon_Name" type="text" class="validate" name="employeeName" value="{{old('employeeName')}}">
                        <label for="icon_Name">Name </label>
                        <span class="helper-text" data-error="wrong" style="color: red;">@error ('employeeName') {{$message}} @enderror</span>
                    </div>

                    <div class="input-field">
                        <i class="material-icons prefix">phone_android</i>
                        <input id="icon_mobileNum" type="text" class="validate" name="employeeMobile" value="{{old('employeeMobile')}}">
                        <label for="icon_mobileNum">Mobile Phone Number </label>
                        <span class="helper-text" data-error="wrong" style="color: red;">@error ('employeeMobile') {{$message}} @enderror</span>
                    </div>

                    <div class="input-field">
                        <i class="material-icons prefix">home</i>
                        <input id="icon_HAddress" type="text" class="validate" name="employeeAddress" value="{{old('employeeAddress')}}">
                        <label for="icon_HAddress">Home Address </label>
                        <span class="helper-text" data-error="wrong" style="color: red;">@error ('employeeAddress') {{$message}} @enderror</span>
                    </div>

                    <div class="input-field">
                        <i class="material-icons prefix">mail</i>
                        <input id="icon_Email" type="text" class="validate" name="employeeEmail" value="{{old('employeeEmail')}}">
                        <label for="icon_Email">Email Address </label>
                        <span class="helper-text" data-error="wrong" style="color: red;">@error ('employeeEmail') {{$message}} @enderror</span>
                    </div>

                    <div class="input-field">
                        <i class="material-icons prefix">lock</i>
                        <input id="icon_pw" type="password" class="validate" name="employeePw" value="{{old('employeePw')}}">
                        <label for="icon_pw">Password </label>
                        <span class="helper-text" data-error="wrong" style="color: red;">@error ('employeePw') {{$message}} @enderror</span>
                    </div>

                    <br />
                    <div class="center">
                        <button class="waves-effect waves-light btn-large" type="submit">submit</button>
                        <br /><br />
                        <a href="loginEmployee">Login Here</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var options = {};
    var instances = M.FormSelect.init(elems, options);
    });
</script>

@endsection