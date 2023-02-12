@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
            <a href="{{url('diseases')}}" style="font-family: Candara; font-size: 35px; color:black">
                <i class="material-icons">arrow_back</i>Back to Disease List
            </a>
            <h2 style="font-family: Candara">Edit Disease Details</h1>
                <form action="{{ url('update-disease/' . $disease->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    @if(Session::has('success'))
                    <a>{{Session::get('success')}}</a>
                    @endif

                    @if(Session::has('fail'))
                    <a style="color: red;">{{Session::get('fail')}}</a>
                    @endif
                    <div class="form group">
                        <div class="input-field">
                            <input value="{{ $disease->diseaseName }}" placeholder="{{ $disease->diseaseName }}" id="icon_diseaseName" type="text" class="validate" name="diseaseName">
                            <label for="icon_diseaseName">New Disease Name </label>
                            <span class="helper-text" data-error="wrong" style="color: red;">@error ('diseaseName') {{$message}} @enderror</span>
                        </div>

                        <div class="input-field">
                            <input value="{{ $disease->diseaseDesc }}" placeholder="{{ $disease->diseaseDesc }}" id="icon_diseaseDesc" type="text" class="validate" name="diseaseDesc">
                            <label for="icon_diseaseDesc">Disease Description </label>
                            <span class="helper-text" data-error="wrong" style="color: red;">@error ('diseaseDesc') {{$message}} @enderror</span>
                        </div>

                        <div class="input-field">
                            <select name="diseaseType">
                                <option value="" disabled selected>Curent Disease Type: {{ $disease->diseaseType }}</option>
                                <option value="Infectious Disease">Infectious Disease</option>
                                <option value="Deficiency Disease">Deficiency Disease</option>
                                <option value="Hereditary Disease">Hereditary Disease</option>
                                <option value="Physiological Disease">Physiological Disease</option>
                            </select>
                            <label>Disease Type</label>
                            <span class="helper-text" data-error="wrong" style="color: red;">@error ('diseaseType') {{$message}} @enderror</span>
                        </div>

                        <div class="input-field">
                            <select name="diseaseCrit">
                                <option value="" disabled selected>Current Disease Criticalness: {{ $disease->diseaseCrit }}</option>
                                <option value="High">High</option>
                                <option value="Medium">Medium</option>
                                <option value="Low">Low</option>
                            </select>
                            <label>Disease Criticalness</label>
                            <span class="helper-text" data-error="wrong" style="color: red;">@error ('diseaseCrit') {{$message}} @enderror</span>
                        </div>

                        <br />
                        <div class="center">
                            <button class="waves-effect waves-light btn-large orange" type="submit">submit</button>
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