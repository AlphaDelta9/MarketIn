@extends('layout')
@section('content')
{{$project->title}}
{{$project->city_name}}
@auth
    @if ($project->user_id !== auth()->user()->id)
        @if (auth()->user()->projectDetails->find($project->id) == null)
        <form action="{{secure_url("project/".$project->id)}}" method="post">
            @csrf
            <input type="submit" value="Assign">
        </form>
        @else
        <form action="{{secure_url("project/".$project->id)}}" method="post">
            @csrf
            @method('PATCH')
            <input type="submit" value="Cancel">
        </form>
        @endif
    @endif
@endauth
@endsection
