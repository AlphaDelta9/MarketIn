@extends('layouts.app')
@section('title','Riwayat Proyek')
@include('layouts.navbar')

@section('content')

    <section class="py-2">
        <div class="container">
            @if(auth()->user()->role)
            <form class="space-y-5" action="{{url('history')}}" method="get">
                <label for="filter" class="block mb-2 text-sm">Status Project</label>
                <select name="filter" class="w-full px-3 py-2 border-b border-gray-400" id="">
                    <option value=""></option>
                    <option value="Active" @if (old('filter') == 'Active') selected @endif>Active</option>
                    <option value="Finish" @if (old('filter') == 'Finish') selected @endif>Finish</option>
                </select>
                <button class="block ml-auto btn btn-primary" type="submit">Filter</button>
            </form>
            @else
            <form class="space-y-5" action="{{url('history')}}" method="get">
                <label for="filter" class="block mb-2 text-sm">Status Project</label>
                <select name="filter" class="w-full px-3 py-2 border-b border-gray-400" id="">
                    <option value=""></option>
                    <option value="Pending" @if (old('filter') == 'Pending') selected @endif>Pending</option>
                    <option value="Accepted" @if (old('filter') == 'Accepted') selected @endif>Accepted</option>
                </select>
                <button class="block ml-auto btn btn-primary" type="submit">Filter</button>
            </form>
            @endif
            <div class="mb-4 tab-title">Proyek</div>

            <table class="table">
                <thead>
                <tr>
                    <td>Nama Proyek</td>
                    <td>Lokasi</td>
                    <td>Status</td>
                    <td></td>
                </tr>
                </thead>

                <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td><a href="{{ url('project/'.(auth()->user()->role ? $project->id : $project->project_header->id)) }}" class="text-primary hover:text-primary-dark">{{ auth()->user()->role ? $project->title : $project->project_header->title }}</a></td>
                        {{-- <td>{{ $project['type'] }}</td> --}}
                        <td>{{ auth()->user()->role ? $project->city_name : $project->project_header->city_name }}</td>
                        @if (auth()->user()->role)
                        @if ($project->deleted_at)
                        <td class="font-bold text-danger">Cancel</td>
                        @elseif ($project->finished_at)
                        <td class="font-bold text-success">Finish</td>
                        @else
                        <td class="font-bold text-warning">Active</td>
                        @endif
                        @else
                        @if ($project->deleted_at)
                        @if ($project->rejected_at)
                        <td class="font-bold text-danger">Rejected</td>
                        @else
                        <td class="font-bold text-danger">Cancel</td>
                        @endif
                        @elseif ($project->accepted_at)
                        @if ($project->completed_at)
                        <td class="font-bold text-success">Finish</td>
                        @else
                        <td class="font-bold text-warning">On Progress</td>
                        @endif
                        @else
                        <td class="font-bold text-warning">Pending</td>
                        @endif
                        @endif
                        <td>
                            @if (!auth()->user()->role)
                                @if ($project->accepted_at)
                                <form action="{{url('upload/'.$project->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="status" class="border-b border-gray-400" placeholder="Progress" value="{{old('status',$project->overview)}}" @if($project->completed_at) disabled @endif>
                                    @if (!$project->completed_at)
                                    <input type="file" name="file">
                                    <input type="submit" class="btn btn-primary" value="Upload">
                                    @endif
                                </form>
                                @if ($project->mime)
                                <a class="btn btn-primary" href="{{url('download/'.$project->id.'/'.$project->project_header->title)}}">Download</a>
                                @endif
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                    {{$projects->links()}}
            </div>
        </div>

    </section>
@endsection
