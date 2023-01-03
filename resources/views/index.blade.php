@extends('layout')
@section('content')
@guest
    <a href="{{secure_url("login")}}">Login</a>
    <a href="{{secure_url("register")}}">Register</a>
@endguest
@auth
    <button type="submit"><a href="{{secure_url("logout")}}">Logout</a></button>
@endauth
@foreach ($list as $header)
    <a href={{secure_url("project/$header->id")}}>
        {{$header->title}}
    </a>
@endforeach

@endsection
