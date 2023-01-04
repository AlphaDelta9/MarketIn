@extends('layout')
@section('content')
{{$project->title}}
{{$project->city_name}}
<form action="{{secure_url("assign/$project->id")}}" method="post">
    @csrf
    <input type="submit" value="Submit">
</form>
@endsection
