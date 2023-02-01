<div class="bg-white rounded-lg border border-gray-200 relative top-0 hover:shadow-lg hover:-top-2 transition-all overflow-hidden">
    <img src="data:{{$project->mime}};base64,{{$project->picture}}" alt="" class="w-full h-48 object-cover object-center">
    <div class="py-3 px-4">
        <a href="{{ url('/project/'.$project->id) }}" class="block transition hover:text-primary mb-2">
            {{--        <div class="text-warning font-bold mb-2">Sedang Proses</div>--}}
                    <div class="space-y-1">
                        <div class="flex">
                            <div class="flex-1 text-lg font-bold" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap">{{ $project->title }}</div>
                        </div>
                        <div class="flex">
                            <div class="flex-1">Lokasi: {{ $project->city_name }}</div>
                        </div>
                        <div class="flex">
                            <div class="flex-1">Batas Pengerjaan: {{ $project->work->format('Y-m-d') }}</div>
                        </div>
                        <div class="flex">
                            <div class="flex-1">Budget: Rp. {{ $project->budget }}</div>
                        </div>
            {{--            <div class="flex">--}}
            {{--                <div class="flex-1 font-bold pr-2">Total Pelamar</div>--}}
            {{--                <div class="flex-1">1 Orang</div>--}}
            {{--            </div>--}}
                    </div>
        </a>
    </div>
</div>
