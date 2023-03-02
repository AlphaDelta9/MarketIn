@extends('layouts.app')
@section('title','Search')
@include('layouts.navbar')
@section('content')

	<section class="section" id="">
		<div class="container">
            <form class="mb-4 space-y-5" action="{{url('search')}}" method="get">
                <div>
                    <label for="city" class="block mb-2 text-sm">Kota</label>
                    <input type="text" name="city" class="w-full px-3 py-2 border-b border-gray-400" id=""
                    list="city" value="{{old('city')}}">
                    <datalist id="city">
                        @foreach($cities as $city)
                            <option value="{{ $city->name }}">{{ $city->name }}</option>
                        @endforeach
                    </datalist>
                    @error('city')
                    <div class="mt-1 text-sm text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="type" class="block mb-2 text-sm">Jenis</label>
                    <input type="text" name="type" class="w-full px-3 py-2 border-b border-gray-400" id=""
                    list="type" value="{{old('type')}}">
                    <datalist id="type">
                        @foreach($types as $type)
                            <option value="{{ $type->name }}">{{ $type->name }}</option>
                        @endforeach
                    </datalist>
                    @error('type')
                    <div class="mt-1 text-sm text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="search" class="block mb-2 text-sm">Nama</label>
                    <input type="search" name="search" class="w-full px-3 py-2 border-b border-gray-400" id=""
                    value="{{old('search')}}">
                    @error('search')
                    <div class="mt-1 text-sm text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <input class="block ml-auto btn btn-primary" type="submit" value="Search">
            </form>
            <div class="grid grid-cols-3 gap-5 mb-4">
                @foreach($projects as $project)
                    <div>
                        @include('layouts.project-card', ['project' => $project])
                    </div>
                @endforeach
            </div>
            {{$projects->links()}}
		</div>
	</section>

@endsection
