@extends('layout')
@section('content')

@isset($logA)
@foreach ($logA as $log)
    <a href={{secure_url("project/".$log->projectHeader->id)}}>
        {{$log->projectHeader->title}}
    </a>
    {{$log->updated_at}}
@endforeach
@endisset
@isset($logP)
@foreach ($logP as $log)
    <a href={{secure_url("edit/".$log->id)}}>
        {{$log->title}}
    </a>
    {{$log->updated_at}}
@endforeach
@endisset

@endsection
