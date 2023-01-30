@extends('front.layouts.app')
@section('title','Profile')
@include('front.layouts.navbar')

@section('content')

    <section class="py-2">
        <div class="container">
            @if(auth()->user()->role)
            <form class="space-y-5" action="{{url('history')}}" method="get">
                <label for="filter" class="block mb-2 text-sm">Status Project</label>
                <select name="filter" class="w-full px-3 py-2 border-b border-gray-400" id="">
                    <option value=""></option>
                    <option value="Active" @if (old('filter') == 'Active') selected @endif>Active</option>
                    <option value="Done" @if (old('filter') == 'Done') selected @endif>Done</option>
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
                        <td class="font-bold text-success">Done</td>
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
                        <td class="font-bold text-success">Accepted</td>
                        @else
                        <td class="font-bold text-warning">Pending</td>
                        @endif
                        @endif
                        <td>
                            @if (!auth()->user()->role)
                                @if ($project->accepted_at && $project->project_header->type_name != 'Iklan')
                                <form action="{{url('upload/'.$project->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="file">
                                    <input type="submit" class="btn btn-primary" value="Upload">
                                    @if ($project->mime)
                                    <a class="btn btn-primary" href="{{url('download/'.$project->id.'/'.$project->project_header->title)}}">Download</a>
                                    @endif
                                </form>
                                @endif
                            @endif
                        </td>
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
            <div class="mt-4">
                            {{$projects->links()}}
            </div>
        </div>

        <div id="rate-modal" class="absolute top-0 left-0 w-full h-full transition scale-0 bg-black/30">
            <div class="absolute transform -translate-x-1/2 -translate-y-1/2 bg-white divide-y divide-gray-300 rounded-lg top-1/2 left-1/2" style="width: 500px">
                <div class="flex items-center justify-between px-6 py-4 text-xl">
                    <div>Rate <b>Melvin</b></div>
                    <div>
                        <i class="cursor-pointer fas fa-times hover:text-danger" onclick="toggleModal('rate-modal', 'scale-0')"></i>
                    </div>
                </div>

                <div class="px-6 py-4">
                    <div id="rating" class="flex mb-3 space-x-2 text-3xl rating">
                        <i class="cursor-pointer fas fa-star"></i>
                        <i class="cursor-pointer fas fa-star"></i>
                        <i class="cursor-pointer fas fa-star"></i>
                        <i class="cursor-pointer fas fa-star"></i>
                        <i class="cursor-pointer fas fa-star"></i>
                    </div>
                    <textarea name="feedback" id="feedback" placeholder="Pesan/Kesan..." class="w-full p-2 border border-gray-200 rounded-lg"></textarea>
                </div>

                <div class="px-6 py-4 text-right">
                    <button class="btn btn-danger-transparent" onclick="toggleModal('rate-modal', 'scale-0')"><i class="mr-2 fas fa-times"></i>Cancel</button>
                    <button class="btn btn-success" onclick="toggleModal('rate-modal', 'scale-0')"><i class="mr-2 fas fa-money-bill-wave-alt"></i>Rate</button>
                </div>
            </div>
        </div>

        <div id="preview-modal" class="absolute top-0 left-0 w-full h-full transition scale-0 bg-black/30">
            <div class="absolute transform -translate-x-1/2 -translate-y-1/2 bg-white divide-y divide-gray-300 rounded-lg top-1/2 left-1/2" style="width: 500px">
                <div class="flex items-center justify-between px-6 py-4 text-xl">
                    <div>Makmur Rice Bow</div>
                    <div>
                        <i class="cursor-pointer fas fa-times hover:text-danger" onclick="toggleModal('preview-modal', 'scale-0')"></i>
                    </div>
                </div>

                <div class="px-6 py-4">
                    <div class="overflow-hidden h-80">
                        <img src="{{ asset('images/result/donald-snack.jpg') }}" alt="Preview Image" class="object-cover object-center h-full">
                        <div class="absolute text-5xl font-bold rotate-45 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 opacity-40">Market'In</div>
                    </div>
                </div>

                <div class="px-6 py-4 text-right">
                    <button class="btn btn-danger-transparent" onclick="toggleModal('preview-modal', 'scale-0')"><i class="mr-2 fas fa-times"></i>Batal</button>
                    <button class="btn btn-success" onclick="toggleModal('preview-modal', 'scale-0')"><i class="mr-2 fas fa-money-bill-wave-alt"></i>Bayar</button>
                </div>
            </div>
        </div>

        <div id="upload-form-modal" class="absolute top-0 left-0 w-full h-full transition transform scale-0 bg-black/30">
            <div class="absolute transform -translate-x-1/2 -translate-y-1/2 bg-white divide-y divide-gray-300 rounded-lg top-1/2 left-1/2" style="width: 500px">
                <div class="flex items-center justify-between px-6 py-4 text-xl">
                    <div>Makmur Rice Bow</div>
                    <div>
                        <i class="cursor-pointer fas fa-times hover:text-danger" onclick="toggleModal('upload-form-modal', 'scale-0')"></i>
                    </div>
                </div>

                <div class="px-6 py-4">
                    <div class="flex text-sm">
                        <input type="text" id="file-name" class="flex-1 w-full px-6 py-2 bg-gray-100 rounded-l-lg text-ellipsis" readonly>
                        <label for="upload-file" class="flex items-center rounded-l-none rounded-r-lg btn btn-primary">
                            <i class="mr-2 fas fa-upload"></i>Upload File
                        </label>
                    </div>
                    <input type="file" id="upload-file" class="hidden" onchange="fileChanged(this)">
                </div>

                <div class="px-6 py-4 text-right">
                    <button class="btn btn-danger-transparent" onclick="toggleModal('upload-form-modal', 'scale-0')"><i class="mr-2 fas fa-times"></i>Batal</button>
                    <button class="btn btn-success" onclick="toggleModal('upload-form-modal', 'scale-0')"><i class="mr-2 fas fa-upload"></i>Kirim</button>
                </div>
            </div>
        </div>

        <div id="accept-confirmation-modal" class="absolute top-0 left-0 w-full h-full transition transform -translate-y-full bg-black/30">
            <div class="absolute transform -translate-x-1/2 -translate-y-1/2 bg-white divide-y divide-gray-300 rounded-lg top-1/2 left-1/2" style="width: 500px">
                <div class="flex items-center justify-between px-6 py-4 text-xl">
                    <div>Makmur Rice Bow</div>
                    <div>
                        <i class="cursor-pointer fas fa-times hover:text-danger" onclick="toggleModal('accept-confirmation-modal')"></i>
                    </div>
                </div>

                <div class="px-6 py-4 text-xl">
                    Konfirmasi <b class="text-success">terima</b> lamaran dari <b>John</b>
                </div>

                <div class="px-6 py-4 text-right">
                    <button class="btn btn-danger-transparent" onclick="toggleModal('accept-confirmation-modal')"><i class="mr-2 fas fa-times"></i>Batal</button>
                    <button class="btn btn-success" onclick="toggleModal('accept-confirmation-modal')"><i class="mr-2 fas fa-check"></i>Terima</button>
                </div>
            </div>
        </div>

        <div id="reject-confirmation-modal" class="absolute top-0 left-0 w-full h-full transition transform -translate-y-full bg-black/30">
            <div class="absolute transform -translate-x-1/2 -translate-y-1/2 bg-white divide-y divide-gray-300 rounded-lg top-1/2 left-1/2" style="width: 500px">
                <div class="flex items-center justify-between px-6 py-4 text-xl">
                    <div>Makmur Rice Bow</div>
                    <div>
                        <i class="cursor-pointer fas fa-times hover:text-danger" onclick="toggleModal('reject-confirmation-modal')"></i>
                    </div>
                </div>

                <div class="px-6 py-4 text-xl">
                    Konfirmasi <b class="text-danger">tolak</b> lamaran dari <b>John</b>
                </div>

                <div class="px-6 py-4 text-right">
                    <button class="btn btn-danger-transparent" onclick="toggleModal('reject-confirmation-modal')"><i class="mr-2 fas fa-times"></i>Batal</button>
                    <button class="btn btn-danger" onclick="toggleModal('reject-confirmation-modal')"><i class="mr-2 fas fa-check"></i>Tolak</button>
                </div>
            </div>
        </div>
    </section>
@endsection
