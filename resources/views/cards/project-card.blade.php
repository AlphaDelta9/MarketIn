<div class="bg-white rounded-lg border border-gray-200 relative top-0 hover:shadow-lg hover:-top-2 transition-all overflow-hidden">
    <img src="{{ asset('R6E_Operator_HP_Lion.webp') }}" alt="" class="w-full h-48 object-cover object-center">
    <div class="py-3 px-4">
        <a href="{{ url('/project/'.$project->id) }}" class="block transition hover:text-primary mb-2">
            {{--        <div class="text-warning font-bold mb-2">Sedang Proses</div>--}}
                    <div class="space-y-1">
                        <div class="flex">
                            <div class="flex-1 text-lg font-bold" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap">{{ $project->title }}</div>
                        </div>
                        <div class="flex">
                            <div class="flex-1">{{ $project->city_name }}</div>
                        </div>
            {{--            <div class="flex">--}}
            {{--                <div class="flex-1 font-bold pr-2">Total Pelamar</div>--}}
            {{--                <div class="flex-1">1 Orang</div>--}}
            {{--            </div>--}}
                    </div>
        </a>
    </div>
</div>
