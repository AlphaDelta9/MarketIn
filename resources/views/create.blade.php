@extends('layout')
@section('content')

<form action="/create" method="post" class="container-fluid p-3">
    @csrf
    <div class="row mb-3 justify-content-sm-center">
        <div class="col-sm-6">
            <input type="text" class="form-control" name="title" id=""
            placeholder="Title" value="{{old('title')}}">
        </div>
    </div>
    <div class="row mb-3 justify-content-sm-center">
        <div class="col-sm-6">
            <textarea name="description" class="form-control" id=""
            placeholder="Description">{{old('description')}}</textarea>
        </div>
    </div>
    <div class="row mb-3 justify-content-sm-center">
        <div class="col-sm-6">
            <input type="text" name="city" class="form-control" id=""
            placeholder="City" list="city" value="{{old('city')}}">
        </div>
    </div>
    <div class="row mb-3 justify-content-sm-center">
        <input type="submit" value="Create">
    </div>
</form>
<datalist id="city">
    @foreach ($city as $name)
        <option value="{{$name->name}}"></option>
    @endforeach
</datalist>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
