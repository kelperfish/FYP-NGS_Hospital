@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
            <div id="printArea">
                <h4 style="font-family: Candara">Medicine Report</h4>
                <?php
                echo "Date: " . date('d/m/Y') . "<br>";
                date_default_timezone_set("Asia/Kuala_Lumpur");
                echo "Time: " . date("h:i:s a");
                ?>
                <p>{{$count}} Record(s) Found</p>
                <table class="centered">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Price (RM)</th>
                        <th>Stock</th>
                    </thead>

                    <tbody>
                        @foreach ($med as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->medName }}</td>
                            <td>{{ $item->medType }}</td>
                            <td>{{ $item->medPrice }}</td>
                            <td>{{ $item->medStock }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>Stock Total</b></td>
                            <td><b>{{$totalMedicine}}</b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>

            <div class="center">
                <a onclick="printDiv('printArea')" class="waves-effect waves-light btn-large orange">print</a>
                <a href="{{url('medicine')}}" class="waves-effect waves-light btn-large brown">back</a>
            </div>
        </div>
    </div>
</div>


<script>
    function printDiv(printArea) {
        var printContents = document.getElementById("printArea").innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>

@endsection