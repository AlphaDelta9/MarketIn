@extends('layouts.app')
@section('title','Detail Proyek')
@include('layouts.navbar')

@section('content')

    <section class="py-20">
        <div class="container">
            <div>
                <div class="grid grid-cols-2 gap-x-7">
                    <div class="h-80 rounded-xl overflow-hidden">
                        <img src="data:{{$project->mime}};base64,{{$project->picture}}" alt="" class="w-full h-full object-cover object-center">
                    </div>
                    <div>
                        <div class="text-2xl font-bold mb-4">{{ $project->title }} - {{$project->type_name}}</div>
                        <div class="border-t border-gray-300 space-y-2 pt-6">
                                <div class="font-bold mb-2" style="white-space: pre-line">{{ $project->description }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @auth
                @if($project->user()->is(auth()->user()))
                <div class="mt-4 grid grid-cols-2">
                    <div class="text-base">
                        <p class="">
                            Lokasi: {{ $project->city_name }}
                        </p>
                        <p class="">
                            Batas Pengerjaan: {{ $project->work->format('Y-m-d') }}
                        </p>
                        <p class="">
                            Budget: Rp. {{ $project->budget }}
                        </p>
                    </div>
                    @if (!$project->finished_at && !$project->deleted_at)
                    <div class="text-right">
                        <a href="{{ url('/edit/'.$project->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
                    @endif
                    @if (!$project->trashed())
                    <table class="table mt-4">
                        <thead>
                        <tr>
                            <td>Nama</td>
                            @if($project->type_name != 'Iklan')
                            <td>Status</td>
                            @endif
                            <td></td>
                        </tr>
                        </thead>

                        <tbody>
                            @forelse ($project->project_details as $detail)
                            <tr>
                                <td><a href="{{url('assign/'.$detail->id)}}">{{ $detail->user->name }}</a></td>
                                @if ($detail->accepted_at)
                                @if($project->type_name != 'Iklan')
                                    @if($detail->completed_at)
                                    <td class="text-success font-bold">Done</td>
                                    @else
                                    <td class="text-warning font-bold">On Progress</td>
                                    @endif
                                @endif
                                <td>
                                    {{$detail->overview}}
                                    @if ($detail->mime)
                                    <form action="{{url('download/'.$detail->id.'/'.$project->title)}}" method="get">
                                        <input type="submit" class="btn btn-primary" value="Download">
                                    </form>
                                    @endif
                                    @if ($detail->completed_at && !$detail->price)
                                    <form action="{{url("pay/".$detail->id)}}" method="get">
                                        @csrf
                                        <input type="submit" class="btn btn-primary" value="Pay">
                                    </form>
                                    @elseif (!$detail->completed_at && $detail->mime)
                                    <form action="{{url("complete/".$detail->id)}}" method="post">
                                        @csrf
                                        <input type="submit" class="btn btn-primary" value="Done">
                                    </form>
                                    @endif
                                </td>
                                @else
                                @if($project->type_name != 'Iklan')
                                <td class="text-warning font-bold">Pending</td>
                                @endif
                                <td class="">
                                    @if (!$detail->accepted_at && !$detail->rejected_at)
                                    <form action="{{url("accept/".$detail->id)}}" method="post">
                                        @csrf
                                        @method('put')
                                        <input type="submit" class="btn btn-primary" value="Accept">
                                    </form>
                                    <form action="{{url("reject/".$detail->id)}}" method="post">
                                        @csrf
                                        @method('patch')
                                        <input type="submit" class="btn btn-primary" value="Reject">
                                    </form>
                                    @endif
                                </td>
                                @endif
                            </tr>
                            @empty
                            <tr>
                                <td class="flex-1 font-bold pr-2" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap"> No users</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    @endif
                @elseif (filled(auth()->user()->role) && !auth()->user()->role)
                    @if (blank(auth()->user()->project_details->where('project_header_id',$project->id)))
                    <form class="mt-4" action="{{url("project/".$project->id)}}" method="post">
                        @csrf
                        <input type="submit" class="btn btn-primary" value="Apply">
                    </form>
                    @elseif (auth()->user()->project_details()->where('project_header_id',$project->id)->first() && $project->type_name == 'Iklan')
                    <form class="mt-4" action="{{url("download/".$project->id."/".$project->title)}}" method="post">
                        @csrf
                        <input type="submit" class="btn btn-primary" value="Download">
                    </form>
                    @elseif (!auth()->user()->project_details()->where('project_header_id',$project->id)->first()->accepted_at)
                    <form class="mt-4" action="{{url("project/".auth()->user()->project_details->where('project_header_id',$project->id)->first()->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-primary" value="Cancel">
                    </form>
                    @endif
                @endif
                @endauth
            </div>
        </div>
    </section>

@endsection
