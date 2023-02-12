@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
            <a href="{{url('medicine')}}" style="font-family: Candara; font-size: 35px; color:black">
                <i class="material-icons">arrow_back</i>Back to Medicine List
            </a>
            <h2 style="font-family: Candara">Edit Medicine Details</h1>
            <form action="{{ url('update-medicine/' . $Medicine->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                @if(Session::has('success'))
                    <a>{{Session::get('success')}}</a>
                @endif

                @if(Session::has('fail'))
                    <a style="color: red;">{{Session::get('fail')}}</a>
                @endif
                <div class="form group">
                    <div class="input-field col s6">
                        <input value="{{ $Medicine->medName }}" placeholder="{{ $Medicine->medName }}" id="medicine_name" name="medName" type="text" class="validate">
                        <label for="medicine_name">New Medicine Name</label>
                        <span class="helper-text" data-error="wrong" style="color: red;">@error ('medName') {{$message}} @enderror</span>
                    </div>

                    <div class="input-field col s6">
                        <select name="medType">
                            <option value="" disabled selected>Current Medicine Type: {{ $Medicine->medType }}</option>
                            <option value="Liquid">Liquid</option>
                            <option value="Tablet">Tablet</option>
                            <option value="Capsules">Capsules</option>
                        </select>
                        <label>New Medicine Type</label>
                        <span class="helper-text" data-error="wrong" style="color: red;">@error ('medType') {{$message}} @enderror</span>
                    </div>

                    <div class="input-field col s6">
                        <input value="{{ $Medicine->medPrice }}" placeholder="{{ $Medicine->medPrice }}" id="medicine_price" name="medPrice" type="text" class="validate">
                        <label for="medicine_price">New Medicine Price</label>
                        <span class="helper-text" data-error="wrong" style="color: red;">@error ('medPrice') {{$message}} @enderror</span>
                    </div>

                    <div class="input-field col s6">
                        <input value="{{ $Medicine->medStock }}" placeholder="{{ $Medicine->medStock }}" id="medicine_stock" name="medStock" type="text" class="validate">
                        <label for="medicine_stock">New Medicine Stock</label>
                        <span class="helper-text" data-error="wrong" style="color: red;">@error ('medStock') {{$message}} @enderror</span>
                    </div>

                    <div class="input-field col s12">
                        <input value="{{ $Medicine->medDesc }}" placeholder="{{ $Medicine->medDesc }}" id="medicine_desc" name="medDesc" type="text" class="validate">
                        <label for="medicine_desc">New Medicine Description</label>
                        <span class="helper-text" data-error="wrong" style="color: red;">@error ('medDesc') {{$message}} @enderror</span>
                    </div>

                    <br />
                    <div class="center">
                        <button class="waves-effect waves-light orange btn-large" type="submit">submit</button>
                        <a class="waves-effect waves-light red btn-large" href="{{url('medicine')}}">cancel</a>
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