@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
            <a href="{{url('employees')}}" style="font-family: Candara; font-size: 35px; color:black">
                <i class="material-icons">arrow_back</i>Back to Employees List
            </a>
            <h2 style="font-family: Candara">Add New Task</h1>
                <form action="{{route('insert-task')}}" method="post">
                    @csrf
                    @if(Session::has('success'))
                    <a>{{Session::get('success')}}</a>
                    @endif

                    @if(Session::has('fail'))
                    <a style="color: red;">{{Session::get('fail')}}</a>
                    @endif
                    <div class="form group">
                        <div class="input-field">
                            <i class="material-icons prefix">sort_by_alpha</i>
                            <input id="icon_medName" type="text" class="validate" name="taskName" value="{{old('taskName')}}">
                            <label for="icon_medName">Task Name </label>
                            <span class="helper-text" data-error="wrong" style="color: red;">@error ('taskName') {{$message}} @enderror</span>
                        </div>

                        <div class="input-field">
                            <i class="material-icons prefix">description</i>
                            <input id="icon_medPrice" type="text" class="validate" name="taskDesc" value="{{old('taskDesc')}}">
                            <label for="icon_medPrice">Task Description </label>
                            <span class="helper-text" data-error="wrong" style="color: red;">@error ('taskDesc') {{$message}} @enderror</span>
                        </div>

                        <input type="hidden" value="Undone" name="taskStatus">
                        <!-- can only pass one employee ID -->
                        <input type="hidden" value="{{$collection->employeeID??null}}" name="employeeID">
                        <input type="hidden" value="{{$task??null}}" name="EmpEmployeeID">

                        <div class="center">
                            <button class="waves-effect waves-light btn-large" type="submit">submit</button>
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