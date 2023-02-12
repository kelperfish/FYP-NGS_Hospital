@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
            <h2 style="font-family: Candara">Tasks List</h2>
            <table class="centered">
                <thead>
                    <th>ID</th>
                    <th>Employee Assigned ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                </thead>

                <tbody>
                    @foreach ($Task as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->employeeID }}</td>
                        <td>{{ $item->taskName }}</td>
                        <td>{{ $item->taskDesc }}</td>
                        <td>{{ $item->taskStatus }}</td>
                        <td><a href="{{ url('delete-task' . '/' . $item->id) }}" onclick="M.toast({html: 'Deleting task..'})"><i class="material-icons red-text">delete</i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection