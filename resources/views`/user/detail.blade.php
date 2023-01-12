@extends('app')

@section('title')
    Profil
@endsection

@section('content')
    <section class="pt-20 pb-10">
        <div class="container">
            <div>
                <div>
                    <div class="text-3xl mb-1">Profil <span class="font-bold">Melvin</span></div>
                    <div class="text-gray-400">melvin@gmail.com</div>
                </div>
                <div class="text-gray-500 mt-4">
                    Saya adalah pekerja keras, sudah 5 tahun dalam bidang desain dan sudah bekerja dibeberapa tempat.<br>
                    <a href="" class="text-blue-500">Portofolio Saya</a>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-20">
        <div class="container">
            <div class="rounded-2xl border border-gray-200 p-4">
                <div class="flex space-x-4">
                    <div>
                        @php($avgRating = sprintf("%.1f", $feedback->avg('rating')))
                        <div>
                            <span class="text-5xl">{{ $avgRating }}</span>
                            <span>/5</span>
                        </div>
                        <div class="mt-4 text-lg text-yellow-400 flex space-x-1">
                            @for($num = 1; $num <= 5; $num++)
                                <div class="relative w-5 h-5">
                                    <i class="fas fa-star absolute text-gray-200"></i>
                                    <i class="fas {{ $avgRating >= $num ? 'fa-star' : (ceil($avgRating) == $num ? 'fa-star-half' : 'hidden') }} absolute top-0 left-0"></i>
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="w-px bg-gray-200 rounded-full"></div>
                    <div class="flex-1 space-y-2">
                        @php($ratings = $feedback->groupBy('rating')->map(function($values){ return $values->count(); }))
                        @for($num = 5; $num > 0; $num--)
                            @php($countRating = isset($ratings[$num]) ? $ratings[$num] : 0)
                            <div class="flex items-center space-x-2">
                                <div>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </div>
                                <div>{{ $num }}</div>
                                <div class="flex-1">
                                    <div class="rounded-full relative overflow-hidden h-2 bg-gray-100">
                                        <div class="h-full bg-primary" style="width: {{ $countRating / $ratings->sum() * 100 }}%"></div>
                                    </div>
                                </div>
                                <div>{{ $countRating }}</div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            <div class="mt-10 border-t-2 border-gray-300 space-y-2 divide-y divide-gray-200">
                @foreach($feedback as $data)
                    <div class="ml-5 py-2">
                        <div class="text-lg mb-1">{{ $data->name }}</div>
                        <div class="flex space-x-1">
                            @for($num = 1; $num <= 5; $num++)
                                <i class="fas fa-star {{ $data->rating >= $num ? 'text-yellow-400' : 'text-gray-200' }}"></i>
                            @endfor
                        </div>
                        <div class="text-gray-500 mt-2 mb-3">
                            {{ $data->content }}
                        </div>
                        <div class="text-sm text-right text-gray-400">
                            {{ $data->created_at }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
