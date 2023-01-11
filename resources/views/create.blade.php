@extends('layout')
@section('content')

<form action="/create" method="post">
    @csrf
    <input type="text" name="title" id="" value="{{old('title')}}">
    <textarea name="description" id="">{{old('description')}}</textarea>
    <input type="text" name="city" id="" list="city" value="{{old('city')}}">
    <input type="submit" value="Create">
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
