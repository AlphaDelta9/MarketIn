@extends('layouts.app')
@section('title','Verify')
@include('layouts.navbar')

@section('content')

    <section class="py-2">
        <div class="container">
            <form class="space-y-5" action="{{url('verify')}}" method="get">
                <label for="filter" class="block mb-2 text-sm">Status</label>
                <select name="filter" class="w-full px-3 py-2 border-b border-gray-400" id="">
                    <option value=""></option>
                    <option value="Pending" @if (old('filter') == 'Pending') selected @endif>Pending</option>
                    <option value="Verified" @if (old('filter') == 'Verified') selected @endif>Verified</option>
                </select>
                <button class="block ml-auto btn btn-primary" type="submit">Filter</button>
            </form>
            <div class="mb-4 tab-title">Proyek</div>

            <table class="table">
                <thead>
                <tr>
                    <td>Nama Proyek</td>
                    <td>Pengirim - Penerima</td>
                    <td>Status</td>
                    <td></td>
                </tr>
                </thead>

                <tbody>
                @forelse($projects as $project)
                    <tr>
                        <td><a href="{{ url('project/'.$project->project_header->id) }}" class="text-primary hover:text-primary-dark">{{ $project->project_header->title }}</a></td>
                        {{-- <td>{{ $project['type'] }}</td> --}}
                        <td><a class="text-primary hover:text-primary-dark" href="{{url('detail/'.$project->id)}}">{{$project->project_header->user->name}}</a> - <a class="text-primary hover:text-primary-dark" href="{{url('assign/'.$project->id)}}">{{ $project->user->name }}</a></td>
                        @if ($project->verified_at)
                        <td class="font-bold text-success">Finish</td>
                        @else
                        <td class="font-bold text-warning">Pending</td>
                        @endif
                        <td>
                            @if ($project->price)
                            <form action="{{url('verify/'.$project->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                @if (!$project->verified_at)
                                <input type="submit" class="btn btn-primary" value="Verify">
                                @endif
                            </form>
                                @if (!$project->verified_at)
                                <form action="{{url('verify/'.$project->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                <input type="submit" class="btn btn-primary" value="Reject">
                                </form>
                                @endif
                            <a class="btn btn-primary" href="{{url('verify/'.$project->id.'/'.$project->project_header->title)}}">View Receipt</a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        {{-- <td><a href="{{ route('page.project.detail', ['id' => 1]) }}" class="text-primary hover:text-primary-dark">{{ $project['name'] }}</a></td>
                        <td>{{ $project['type'] }}</td>
                        <td>{{ convertCurrency($project['budget']) }}</td> --}}
                        <td>No project payment</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div class="mt-4">
                    {{$projects->links()}}
            </div>
        </div>
    </section>
@endsection
