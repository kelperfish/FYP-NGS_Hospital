@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
            <a href="{{url('medicine')}}" style="font-family: Candara; font-size: 35px; color:black">
                <i class="material-icons">arrow_back</i>Back to Medicine List
            </a>
            <h2 style="font-family: Candara">Add New Medicine</h1>
            <form action="{{route('add-medicine')}}" method="post">
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
                        <input id="icon_medName" type="text" class="validate" name="medName" value="{{old('medName')}}">
                        <label for="icon_medName">Medicine Name </label>
                        <span class="helper-text" data-error="wrong" style="color: red;">@error ('medName') {{$message}} @enderror</span>
                    </div>

                    <div class="input-field">
                        <select name="medType">
                            <option value="" disabled selected>Choose Medicine Type</option>
                            <option value="Liquid">Liquid</option>
                            <option value="Tablet">Tablet</option>
                            <option value="Capsules">Capsules</option>
                        </select>
                        <label>Medicine Type</label>
                        <span class="helper-text" data-error="wrong" style="color: red;">@error ('medType') {{$message}} @enderror</span>
                    </div>

                    <div class="input-field">
                        <i class="material-icons prefix">attach_money</i>
                        <input id="icon_medPrice" type="text" class="validate" name="medPrice" value="{{old('medPrice')}}">
                        <label for="icon_medPrice">Medicine Price </label>
                        <span class="helper-text" data-error="wrong" style="color: red;">@error ('medPrice') {{$message}} @enderror</span>
                    </div>

                    <div class="input-field">
                        <i class="material-icons prefix">dns</i>
                        <input id="icon_medStock" type="text" class="validate" name="medStock" value="{{old('medStock')}}">
                        <label for="icon_medStock">Medicine Stock </label>
                        <span class="helper-text" data-error="wrong" style="color: red;">@error ('medStock') {{$message}} @enderror</span>
                    </div>

                    <div class="input-field">
                        <i class="material-icons prefix">description</i>
                        <input id="icon_medDesc" type="text" class="validate" name="medDesc" value="{{old('medDesc')}}">
                        <label for="icon_medDesc">Medicine Description </label>
                        <span class="helper-text" data-error="wrong" style="color: red;">@error ('medDesc') {{$message}} @enderror</span>
                    </div>

                    <br />
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