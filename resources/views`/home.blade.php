@extends('app')

@section('title')
    Home
@endsection

@section('content')
{{--    <section class="py-20">--}}
{{--        <div class="container">--}}
{{--            <div class="text-2xl mb-2">Buat Project Baru</div>--}}
{{--            <div class="grid grid-cols-3">--}}
{{--                <div>--}}
{{--                    <img src="{{ asset('images/temp.png') }}" alt="" class="w-80">--}}
{{--                    <div class="mt-2">Logo</div>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <img src="{{ asset('images/temp.png') }}" alt="" class="w-80">--}}
{{--                    <div class="mt-2">Logo</div>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <img src="{{ asset('images/temp.png') }}" alt="" class="w-80">--}}
{{--                    <div class="mt-2">Logo</div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <section class="py-20 bg-gray-100">--}}
{{--        <div class="container">--}}
{{--            <div class="text-2xl mb-2">Project Selesai</div>--}}
{{--            <div>--}}
{{--                <img src="{{ asset('images/temp.png') }}" alt="">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <section class="py-20">
        <div class="container">
            <div class="text-3xl mb-4">Jenis Proyek</div>
            <div class="flex space-x-3">
                @foreach($types as $type)
                    <div class="w-40 rounded-lg border border-gray-200 px-3 py-3 text-center group">
                        <i class="{{ $type->icon }} text-primary/50 group-hover:text-primary transition" style="font-size: 60px;"></i>
                        <div class="mt-2 group-hover:text-primary transition">{{ $type->name }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-50">
        <div class="container">
            <div class="text-3xl mb-4">Proyek Rekomendasi</div>
            <div class="grid grid-cols-3 gap-5">
                @foreach($projects as $project)
                    <div>
                        @include('components.cards.project-card', ['project' => $project])
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
