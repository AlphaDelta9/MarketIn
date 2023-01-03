@extends('layout')
@section('content')
{{$project->title}}
{{$project->city_name}}
@isset($detail)
<form action="{{secure_url("project/$project->id")}}" method="post">
    @csrf
    @method('PATCH')
    <input type="submit" value="Cancel">
</form>
@endisset

@empty($detail)
<form action="{{secure_url("project/$project->id")}}" method="post">
    @csrf
    <input type="submit" value="Assign">
</form>
@endempty
@endsection
