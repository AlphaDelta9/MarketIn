@extends('layout')
@section('content')
@foreach ($list as $header)
    <a href={{secure_url("project/".$header->id)}}>
        {{$header->title}}
    </a>
@endforeach
{{$list->links()}}
@endsection
