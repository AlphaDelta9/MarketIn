@extends('layout')
@section('content')
{{$project->title}}
{{$project->city_name}}
@auth
    @if ($project->user()->isNot(auth()->user()))
        @if (auth()->user()->projectDetails->find($project->id) == null)
        <form action="{{url("project/".$project->id)}}" method="post">
            @csrf
            <input type="submit" value="Assign">
        </form>
        @else
        <form action="{{url("project/".$project->id)}}" method="post">
            @csrf
            @method('PATCH')
            <input type="submit" value="Cancel">
        </form>
        @endif
    @endif
@endauth
@endsection
