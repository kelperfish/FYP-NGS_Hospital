@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">

            @if(session()->has('loginEmployeeID'))
            <h1 style="font-family: Candara">Diseases List Management</h1>
            @else
            <h1 style="font-family: Candara">Diseases List</h1>
            @endif

            <table class="centered">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Criticalness</th>
                    @if(session()->has('loginEmployeeID'))
                    <th>Edit</th>
                    <th>Delete</th>
                    @endif
                </thead>

                <tbody>
                    @foreach ($Disease as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->diseaseName }}</td>
                        <td>{{ $item->diseaseDesc }}</td>
                        <td>{{ $item->diseaseType }}</td>
                        <td>{{ $item->diseaseCrit }}</td>
                        @if(session()->has('loginEmployeeID'))
                        <td><a href="{{ url('edit-disease' . '/' . $item->id) }}"><i class="material-icons black-text">create</i></a></td>
                        <td><a href="{{ url('delete-disease' . '/' . $item->id) }}" onclick="M.toast({html: 'Deleting disease..'})"><i class="material-icons red-text">delete</i></a></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>



            <br><br>
            @if(session()->has('loginEmployeeID'))
            <div class="center">
                <a href="add-disease" class="waves-effect waves-light btn-large orange">add new disease</a>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection