@extends('layouts.app')
@section('title','Detail')
@include('layouts.navbar')

@section('content')

    <section class="py-20">
        <div class="container">
            <div>
                <div class="grid grid-cols-3 gap-x-7">
                    <div class="overflow-hidden h-96 rounded-xl">
                        <img src="data:{{$user->mime}};base64,{{$user->picture}}" alt="" class="object-cover object-center w-full h-full">
                    </div>
                    <div class="col-span-2">
                        <div class="mb-4 text-2xl font-bold">{{ $user->name }}</div>
                        <div class="pt-6 space-y-2 border-t border-gray-300">
                            <div class="flex">
                                <div class="mb-2 font-bold" style="white-space: pre-line">{{ $user->profile }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           <div class="mt-10">
            <div class="mb-4 tab-title">Proyek</div>

            <table class="table">
                <thead>
                <tr>
                    <td>Nama Proyek</td>
                    <td>Jenis</td>
                </tr>
                </thead>

                <tbody>
                @foreach($user->project_details->whereNotNull('accepted_at')->sortDesc()->take(5) as $project)
                    <tr>
                        <td><a href="{{ url('project/'.$project->project_header->id) }}" class="text-primary hover:text-primary-dark">{{ $project->project_header->title }}</a></td>
                        {{-- <td>{{ $project['type'] }}</td> --}}
                        <td>{{ $project->project_header->type_name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
           </div>
        </div>
    </section>

@endsection
