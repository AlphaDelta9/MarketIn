@extends('layouts.app')
@section('title','Iklanin')
@include('layouts.navbar')
@section('content')

	<section class="section" id="">
		<div class="container">
            <form class="mb-4 space-y-5" action="{{url('iklanin')}}" method="get">
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
                @forelse($projects as $project)
                    <div>
                        @include('layouts.project-card', ['project' => $project])
                    </div>
                @empty
                    {{-- <div class="col-span-3 bg-white border border-gray-200 relative top-0"> --}}
                        No advertising project{{-- {{auth()->user()->city_name}} --}}
                    {{-- </div> --}}
                @endforelse
            </div>
            {{$projects->links()}}
		</div>
	</section>

@endsection
