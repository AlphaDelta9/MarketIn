@extends('layouts.app')

@section('title')
    Detail
@endsection

@extends('layouts.navbar')

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
{{--                            <div class="flex">--}}
{{--                                <div class="flex-1 font-bold pr-2">Usaha</div>--}}
{{--                                <div class="flex-1">Usaha Makmur Rice Bowl</div>--}}
{{--                            </div>--}}
                            <div class="flex">
                                <div class="font-bold mb-2" style="white-space: pre-line">{{ $user->profile }}</div>
                            </div>
{{--                            <div class="flex">--}}
{{--                                <div class="flex-1 font-bold pr-2">Total Pelamar</div>--}}
{{--                                <div class="flex-1">1 Orang</div>--}}
{{--                            </div>--}}
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
                    {{-- <tr>
                        <td><a href="{{ route('page.project.detail', ['id' => 1]) }}" class="text-primary hover:text-primary-dark">{{ $project['name'] }}</a></td>
                        <td>{{ $project['type'] }}</td>
                        <td>{{ convertCurrency($project['budget']) }}</td>
                        <td></td>
                    </tr> --}}
                @endforeach
                </tbody>
            </table>
           </div>
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
