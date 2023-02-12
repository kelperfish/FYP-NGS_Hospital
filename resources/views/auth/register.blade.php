@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
            <h1 style="font-family: Candara">Doctor Registration</h1>
            <form action="{{ route('register-doctor' )}}" method="post">
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
                        <input id="icon_fName" type="text" class="validate" name="docFirstName" value="{{old('docFirstName')}}">
                        <label for="icon_fName">First Name </label>
                        <span class="helper-text" data-error="wrong" style="color: red;">@error ('docFirstName') {{$message}} @enderror</span>
                    </div>

                    <div class="input-field">
                        <i class="material-icons prefix">person</i>
                        <input id="icon_lNname" type="text" class="validate" name="docLastName" value="{{old('docLastName')}}">
                        <label for="icon_lName">Last Name </label>
                        <span class="helper-text" data-error="wrong" style="color: red;">@error ('docLastName') {{$message}} @enderror</span>
                    </div>

                    <div class="input-field">
                        <i class="material-icons prefix">mail</i>
                        <input id="icon_Email" type="text" class="validate" name="docEmail" value="{{old('docEmail')}}">
                        <label for="icon_Email">Email Address </label>
                        <span class="helper-text" data-error="wrong" style="color: red;">@error ('docEmail') {{$message}} @enderror</span>
                    </div>

                    <div class="input-field">
                        <select name="docSpecialist">
                            <option value="" disabled selected>Choose your Specialist</option>
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

                    <div class="input-field">
                        <i class="material-icons prefix">lock</i>
                        <input id="icon_pw" type="password" class="validate" name="docPw" value="{{old('docPw')}}">
                        <label for="icon_pw">Password </label>
                        <span class="helper-text" data-error="wrong" style="color: red;">@error ('docPw') {{$message}} @enderror</span>
                    </div>

                    <br />
                    <div class="center">
                        <button class="waves-effect waves-light btn-large" type="submit">submit</button>
                        <br /><br />
                        <a href="login">Login Here</a>
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