@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
            <a href="{{url('doctor-dashboard')}}" style="font-family: Candara; font-size: 35px; color:black">
                <i class="material-icons">arrow_back</i>Back to Doctor Profile
            </a>
            <h2 style="font-family: Candara">Edit Doctor Profile</h1>
                <br>
                <form action="{{ url('update-doctor/' . $doctor->id) }}" method="post" enctype="multipart/form-data">
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
                            <input value="{{$doctor->docFirstName}}" placeholder="{{$doctor->docFirstName}}" id="doctor_fName" name="docFirstName" type="text" class="validate">
                            <label for="doctor_fName">Doctor First Name</label>
                            <span class="helper-text" data-error="wrong" style="color: red;">@error ('docFirstName') {{$message}} @enderror</span>
                        </div>

                        <div class="input-field col s6">
                            <input value="{{$doctor->docLastName}}" placeholder="{{$doctor->docLastName}}" id="doctor_LName" name="docLastName" type="text" class="validate">
                            <label for="doctor_LName">Doctor Last Name</label>
                            <span class="helper-text" data-error="wrong" style="color: red;">@error ('docLastName') {{$message}} @enderror</span>
                        </div>

                        <div class="input-field col s12">
                            <input value="{{$doctor->docEmail}}" placeholder="{{$doctor->docEmail}}" id="doctor_email" name="docEmail" type="text" class="validate">
                            <label for="docEmail">Doctor Email Address</label>
                            <span class="helper-text" data-error="wrong" style="color: red;">@error ('docEmail') {{$message}} @enderror</span>
                        </div>

                        <div class="input-field col s12">
                            <select name="docSpecialist">
                                <option value="" disabled selected>Current Specialist: {{$doctor->docSpecialist}}</option>
                                <option value="Cardiologist">Cardiologist</option>
                                <option value="Colon and Rectal Surgeon">Colon and Rectal Surgeon</option>
                                <option value="Dermatologist">Dermatologist</option>
                                <option value="Endocrinologist">Endocrinologist</option>
                                <option value="Emergency Medicine Specialist">Emergency Medicine Specialist</option>
                                <option value="Gastroenterologist">Gastroenterologist</option>
                                <option value="Hematologist">Hematologist</option>
                                <option value="Internist">Internist</option>
                                <option value="Neurologist">Neurologist</option>
                            </select>
                            <label>Specialist Select</label>
                            <span class="helper-text" data-error="wrong" style="color: red;">@error ('docSpecialist') {{$message}} @enderror</span>
                        </div>

                        <div class="center">
                            <button class="waves-effect waves-light orange btn-large" type="submit">submit</button>
                            <a class="waves-effect waves-light red btn-large" href="{{url('doctor-dashboard')}}">cancel</a>
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