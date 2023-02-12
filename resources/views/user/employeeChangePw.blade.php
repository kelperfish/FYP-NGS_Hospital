@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
            <a href="{{url('employee-dashboard')}}" style="font-family: Candara; font-size: 35px; color:black">
                <i class="material-icons">arrow_back</i>Back to Pharmacist Profile
            </a>
            <h2 style="font-family: Candara">Enter New Password</h1>
                <br>
                <form action="{{ url('update-employee-password') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @if(Session::has('success'))
                    <a>{{Session::get('success')}}</a>
                    @endif

                    @if(Session::has('fail'))
                    <a style="color: red;">{{Session::get('fail')}}</a>
                    @endif
                    <div class="form group">
                        <div class="input-field col s12">
                            <input id="pharmacist_updatePw" name="employeePw" type="password" class="validate">
                            <label for="pharmacist_updatePw">Enter your new Password</label>
                        </div>

                        <input type="hidden" name="id" value="{{$Employee->id}}">
                        <div class="center">
                            <button class="waves-effect waves-light orange btn-large" type="submit">submit</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>

@endsection