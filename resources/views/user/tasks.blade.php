@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
            @if(session()->has('loginID'))
            <a href="{{url('employees')}}" style="font-family: Candara; font-size: 35px; color:black">
                <i class="material-icons">arrow_back</i>Back to Employees List
            </a>
            @elseif(session()->has('loginEmployeeID'))
            <a href="{{url('employee-dashboard')}}" style="font-family: Candara; font-size: 35px; color:black">
                <i class="material-icons">arrow_back</i>Back Pharmacist Profile
            </a>
            @endif
            <h2 style="font-family: Candara">Pharmacist Tasks</h2>
            <table class="centered">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                </thead>

                <tbody>
                    @foreach ($Task as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->taskName }}</td>
                        <td>{{ $item->taskDesc }}</td>
                        @if(session()->has('loginEmployeeID'))
                            @if($item->taskStatus == "Undone")                      
                            <td style="width: 250px;">
                                <form action="{{ url('update-task/' . $item->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <select name="taskStatus" class="browser-default" style="width: auto; display: block;margin: 0 auto;" onchange="this.form.submit()">
                                            <option value="" disabled selected>{{ $item->taskStatus }}</option>
                                            <option value="Done">Done</option>
                                        </select>

                                    </div>
                                </form>
                            </td>
                            @else
                            <td>{{ $item->taskStatus }}</td>
                            @endif
                        @elseif(session()->has('loginID'))
                        <td>{{ $item->taskStatus }}</td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <br>
            @if(session()->has('loginID'))
            <div class="center">
                <a href="{{ url('add-task' . '/' . $collection->employeeID) }}" class="waves-effect waves-light btn-large orange">assign task</a>
            </div>
            @endif
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