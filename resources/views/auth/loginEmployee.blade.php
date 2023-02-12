@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
            <h1 style="font-family: Candara">Pharmacist Login</h1>
            <form action="{{ route('login-employee' )}}" method="post">
                @csrf
                @if(Session::has('success'))
                    <a>{{Session::get('success')}}</a>
                @endif

                @if(Session::has('fail'))
                    <a style="color: red;">{{Session::get('fail')}}</a>
                @endif
                <div class="form group">
                    <div class="input-field">
                        <i class="material-icons prefix">mail</i>
                        <input id="icon_user" type="text" class="validate" name="employeeEmail" value="{{old('employeeEmail')}}">
                        <label for="icon_user">Pharmacist Email Address </label>
                        <span class="helper-text" data-error="wrong" style="color: red;">@error ('employeeEmail') {{$message}} @enderror</span>
                    </div>

                    <div class="input-field">
                        <i class="material-icons prefix">https</i>
                        <input id="icon_pw" type="password" class="validate" name="employeePw" value="{{old('employeePw')}}">
                        <label for="icon_pw">Password </label>
                        <span class="helper-text" data-error="wrong" style="color: red;">@error ('employeePw') {{$message}} @enderror</span>
                    </div>

                    <div class="center">
                        <button class="waves-effect waves-light btn-large" type="submit">Login</button>
                        <br /><br />
                        <a href="registerEmployee">Add New Pharmacist Here</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection