@extends('layouts.app')
@section('title','Home')
@include('layouts.navbar')
@section('content')
@isset($active)

	<section class="section container" id="">
            @if(!auth()->user()->role)
            <div class="mb-4 text-3xl">Proyek Sekarang</div>
            @endif
            <div class="grid grid-cols-{{$active->count()}} gap-5 justify-items-center">
                @forelse($active as $item)
                    <div class="flex space-x-3">
                        @if(auth()->user()->role)
                        <a href="{{ url('/create/'.$item->name) }}" class="w-40 px-3 py-3 text-center border border-gray-200 rounded-lg group">
                            <i class="{{ $item->icon }} text-primary/50 group-hover:text-primary transition" style="font-size: 60px;"></i>
                            <div class="mt-2 transition group-hover:text-primary">{{ $item->name }}</div>
                        </a>
                        @elseif(!$item->project_header->finished_at)
                        @include('layouts.project-card', ['project' => $item->project_header])
                        @endif
                    </div>
                @empty
                    <div class="flex-1 pr-2 font-bold" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap"> No projects</div>
                @endforelse
            </div>
	</section>

	<section class="bg-section section homepage-heroes">
		<div class="container">
            @if(auth()->user()->role)
            <div class="mb-4 text-3xl">Proyek Sekarang</div>
            @else
            <div class="mb-4 text-3xl">Proyek Rekomendasi</div>
            @endif
            <div class="grid grid-cols-3 gap-5">
                @forelse($projects as $project)
                    <div>
                        @include('layouts.project-card', ['project' => $project])
                    </div>
                @empty
                    <div class="flex-1 pr-2 font-bold" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap"> No projects</div>
                @endforelse
            </div>
            <div class="text-base">
                {{$projects->links()}}
            </div>
		</div>
	</section>

@endisset
@empty($active)

	<section class="section" id="">
		<div class="container">
            <div class="mb-4 text-3xl">Proyek Rekomendasi</div>
            <div class="grid grid-cols-3 gap-5">
                @foreach($projects as $project)
                    <div>
                        @include('layouts.project-card', ['project' => $project])
                    </div>
                @endforeach
            </div>
            {{$projects->links()}}
		</div>
	</section>

@endempty
@endsection
