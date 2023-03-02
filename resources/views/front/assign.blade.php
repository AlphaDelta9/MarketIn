@extends('layouts.app')
@section('title','Detail')
@include('layouts.navbar')

@section('content')

    <section class="py-20">
        <div class="container">
            <div>
                <div class="grid grid-cols-3 gap-x-7">
                    <div class="h-96 rounded-xl overflow-hidden">
                        <img src="data:{{$user->mime}};base64,{{$user->picture}}" alt="" class="w-full h-full object-cover object-center">
                    </div>
                    <div class="col-span-2">
                        <div class="text-2xl font-bold mb-4">{{ $user->name }}</div>
                        <div class="border-t border-gray-300 space-y-2 pt-6">
                            <div class="flex">
                                <div class="font-bold mb-2" style="white-space: pre-line">{{ $user->profile }}</div>
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
