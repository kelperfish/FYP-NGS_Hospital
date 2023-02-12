@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
            
            <h1 style="font-family: Candara">Employees List</h1>
            <table class="centered">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Mobile Number</th>
                    <th>Address</th>
                    <th>Email</th>
                </thead>

                <tbody>
                    @foreach ($Employees as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->employeeName }}</td>
                        <td>{{ $item->employeeMobile }}</td>
                        <td>{{ $item->employeeAddress }}</td>
                        <td>{{ $item->employeeEmail }}</td>   
                        <td><a href="{{ url('employee-tasks' . '/' . $item->employeeID) }}" class="waves-effect waves-light orange darken-1 btn">check tasks</a></td>
                        <td><a href="{{ url('delete-employee' . '/' . $item->id) }}" onclick="M.toast({html: 'Deleting employee..'})"><i class="material-icons red-text" style="font-size: 2.5rem;">delete</i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection