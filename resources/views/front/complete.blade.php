@extends('layouts.app')
@section('title','Iklanin')
@include('layouts.navbar')

@section('content')

    <section class="py-2">
        <div class="container">
            <form class="space-y-5" action="{{url('verify')}}" method="get">
                <label for="filter" class="block mb-2 text-sm">Status Project</label>
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
                    <td>Nama Pekerja</td>
                    <td></td>
                </tr>
                </thead>
                @forelse ($projects as $project)
                <tr>
                    <td><a href="{{ url('project/'.$project->project_header->id) }}" class="text-primary hover:text-primary-dark">{{ $project->project_header->title }}</a></td>
                    {{-- <td>{{ $project['type'] }}</td> --}}
                    <td><a class="text-primary hover:text-primary-dark" href="{{url('assign/'.$project->id)}}">{{ $project->user->name }}</a></td>
                    <td>
                        {{$project->overview}}
                        @if ($project->upload)
                        <form action="{{url('download/'.$project->id.'/'.$project->project_header->title)}}" method="get">
                            <input type="submit" class="btn btn-primary" value="Download">
                        </form>
                        <form action="{{url("complete/".$project->id)}}" method="post">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="Done">
                        </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td>No advertising project</td></tr>
                @endforelse
                </tbody>
            </table>
            <div class="mt-4">
                    {{$projects->links()}}
            </div>
        </div>

    </section>
@endsection
