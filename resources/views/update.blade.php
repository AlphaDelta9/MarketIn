@extends('layout')
@section('content')

<form action="{{secure_url("edit/$project->id")}}" method="post">
    @csrf
    <input type="text" name="title" id="" value="{{old('title',$project->title)}}">
    <input type="text" name="city" id="" list="city" value="{{old('city',$project->city_name)}}">
    <input type="submit" value="Update">
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
