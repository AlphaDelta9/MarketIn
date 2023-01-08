@extends('layout')
@section('content')

@isset($logA)
@foreach ($logA as $log)
    <a href={{secure_url("project/{{$log->projectHeader->id}}")}}>
        {{$log->projectHeader->title}}
    </a>
@endforeach
@endisset
@isset($logP)
@foreach ($logP as $log)
    <a href={{secure_url("project/{{$log->id}}")}}>
        {{$log->title}}
    </a>
@endforeach
@endisset

@endsection
