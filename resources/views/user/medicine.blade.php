@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">

            @if(session()->has('loginEmployeeID'))
            <h1 style="font-family: Candara">Medicine Management</h1>
            @else
            <h1 style="font-family: Candara">Medicine List</h1>
            @endif

            <table class="centered">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Price (RM)</th>
                    <th>Stock</th>
                    <th>Description</th>
                    @if(session()->has('loginEmployeeID'))
                    <th>Edit</th>
                    <th>Delete</th>
                    @endif
                </thead>

                <tbody>
                    @foreach ($Medicine as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->medName }}</td>
                        <td>{{ $item->medType }}</td>
                        <td>{{ $item->medPrice }}</td>
                        @if($item->medStock < 50)
                        <td style="color: red; font-weight: bold;">
                        {{ $item->medStock }}<i class="material-icons" style="vertical-align: bottom; font-size: 23px !important;">priority_high</i>
                        </td>   
                        @else
                        <td>{{ $item->medStock }}</td>
                        @endif
                        <td>{{ $item->medDesc }}</td>
                        @if(session()->has('loginEmployeeID'))
                        <td><a href="{{ url('edit-medicine' . '/' . $item->id) }}"><i class="material-icons black-text">create</i></a></td>
                        <td><a href="{{ url('delete-medicine' . '/' . $item->id) }}" onclick="M.toast({html: 'Deleting medicine..'})"><i class="material-icons red-text">delete</i></a></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>

            <div class="center">
                @if(session()->has('loginEmployeeID'))
                <a href="{{url('add-medicine')}}" class="waves-effect waves-light btn-large orange">add new medicine</a>
                @else
                <a href="{{url('medicineReport')}}" class="waves-effect waves-light btn-large orange">generate report</a>
                @endif
            </div>

        </div>
    </div>
</div>

@endsection