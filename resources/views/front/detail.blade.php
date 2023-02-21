@extends('front.layouts.app')

@section('title')
    Detail
@endsection

@extends('front.layouts.navbar')

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
{{--                            <div class="flex">--}}
{{--                                <div class="flex-1 font-bold pr-2">Usaha</div>--}}
{{--                                <div class="flex-1">Usaha Makmur Rice Bowl</div>--}}
{{--                            </div>--}}
                            <div class="flex">
                                <div class="font-bold mb-2" style="white-space: pre-line">{{ $project->description }}</div>
                            </div>
{{--                            <div class="flex">--}}
{{--                                <div class="flex-1 font-bold pr-2">Total Pelamar</div>--}}
{{--                                <div class="flex-1">1 Orang</div>--}}
{{--                            </div>--}}
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

{{--            <div class="mt-10">--}}
{{--                <div class="grid grid-cols-2">--}}
{{--                    <div>--}}
{{--                        <button>Forum</button>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <button class="block ml-auto">Daftar Pelamar</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </section>

{{--    <section class="pb-10">--}}
{{--        <div class="container">--}}
{{--            <div class="text-2xl mb-2">Forum</div>--}}
{{--            <div class="divide-y divide-gray-300">--}}
{{--                @foreach($threads as $thread)--}}
{{--                    <div class="pl-4">--}}
{{--                        <div class="py-4">--}}
{{--                            <div class="text-lg font-bold">{{ $thread['title'] }}</div>--}}
{{--                            <div>{{ $thread['content'] }}</div>--}}
{{--                        </div>--}}
{{--                        <div class="pl-8 py-4">--}}
{{--                            <div class="flex">--}}
{{--                                <input type="text" placeholder="Pesan" class="w-full py-3 px-6 rounded-l-lg bg-gray-100 flex-1">--}}
{{--                                <button class="btn btn-primary rounded-l-none rounded-r-lg">Reply</button>--}}
{{--                            </div>--}}
{{--                            <div class="divide-y divide-gray-300">--}}
{{--                                @foreach($thread['replies'] as $reply)--}}
{{--                                    <div class="p-4">--}}
{{--                                        <div class="text-lg font-bold">{{ $reply['name'] }}</div>--}}
{{--                                        <div>{{ $reply['content'] }}</div>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--            <div class="mt-4 text-right">--}}
{{--                <a href="{{ route('page.project.forum.index', ['id' => 1]) }}" class="btn btn-primary inline-block">Forum Discussion <i class="fas fa-chevron-right"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <section class="pt-20 pb-20">--}}
{{--        <div class="container">--}}
{{--            <div class="rounded-2xl border border-gray-200 p-4">--}}
{{--                <div class="flex space-x-4">--}}
{{--                    <div>--}}
{{--                        @php($avgRating = sprintf("%.1f", $feedbacks->avg('rating')))--}}
{{--                        <div>--}}
{{--                            <span class="text-5xl">{{ $avgRating }}</span>--}}
{{--                            <span>/5</span>--}}
{{--                        </div>--}}
{{--                        <div class="mt-4 text-lg text-yellow-400">--}}
{{--                            <div class="flex space-x-1">--}}
{{--                                @for($num = 1; $num <= 5; $num++)--}}
{{--                                    <div class="relative w-5 h-5">--}}
{{--                                        <i class="fas fa-star absolute "></i>--}}
{{--                                        <i class="fas {{ $avgRating >= $num ? 'fa-star' : (ceil($avgRating) == $num ? 'fa-star-half' : 'hidden') }} absolute top-0 left-0"></i>--}}
{{--                                    </div>--}}
{{--                                @endfor--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="w-px bg-gray-200 rounded-full"></div>--}}
{{--                    <div class="flex-1 space-y-2">--}}
{{--                        @php($ratings = $feedbacks->groupBy('rating')->map(function($values){ return $values->count(); }))--}}
{{--                        @for($num = 5; $num > 0; $num--)--}}
{{--                            @php($countRating = isset($ratings[$num]) ? $ratings[$num] : 0)--}}
{{--                            <div class="flex items-center space-x-2">--}}
{{--                                <div>--}}
{{--                                    <i class="fas fa-star text-yellow-400"></i>--}}
{{--                                </div>--}}
{{--                                <div>{{ $num }}</div>--}}
{{--                                <div class="flex-1">--}}
{{--                                    <div class="rounded-full relative overflow-hidden h-2 bg-gray-100">--}}
{{--                                        <div class="h-full bg-primary" style="width: {{ $countRating / $ratings->sum() * 100 }}%"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div>{{ $countRating }}</div>--}}
{{--                            </div>--}}
{{--                        @endfor--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

@endsection
