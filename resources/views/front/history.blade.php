@extends('front.layouts.app')
@section('title','Profile')
@include('front.layouts.navbar')

@section('content')

    <section class="py-20">
        <div class="container">

            <div class="tab-title mb-4">Proyek</div>

            <table class="table">
                <thead>
                <tr>
                    <td>Nama Proyek</td>
                    {{-- <td>Jenis Usaha</td> --}}
                    <td>Lokasi</td>
                    <td>Status</td>
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
                        <td class="text-danger font-bold">Cancel</td>
                        @elseif ($project->finished_at)
                        <td class="text-success font-bold">Done</td>
                        @else
                        <td class="text-warning font-bold">Active</td>
                        @endif
                        @else
                        @if ($project->deleted_at)
                        @if ($project->rejected_at)
                        <td class="text-danger font-bold">Rejected</td>
                        @else
                        <td class="text-danger font-bold">Cancel</td>
                        @endif
                        @elseif ($project->accepted_at)
                        <td class="text-success font-bold">Accepted</td>
                        @else
                        <td class="text-warning font-bold">Pending</td>
                        @endif
                        @endif
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
            {{$projects->links()}}
        </div>

        <div id="rate-modal" class="absolute top-0 left-0 w-full h-full bg-black/30 transition scale-0">
            <div class="bg-white rounded-lg absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 divide-y divide-gray-300" style="width: 500px">
                <div class="flex items-center justify-between text-xl py-4 px-6">
                    <div>Rate <b>Melvin</b></div>
                    <div>
                        <i class="fas fa-times text-gray-300 cursor-pointer hover:text-danger" onclick="toggleModal('rate-modal', 'scale-0')"></i>
                    </div>
                </div>

                <div class="py-4 px-6">
                    <div id="rating" class="flex text-3xl mb-3 space-x-2 rating">
                        <i class="fas fa-star text-gray-200 cursor-pointer"></i>
                        <i class="fas fa-star text-gray-200 cursor-pointer"></i>
                        <i class="fas fa-star text-gray-200 cursor-pointer"></i>
                        <i class="fas fa-star text-gray-200 cursor-pointer"></i>
                        <i class="fas fa-star text-gray-200 cursor-pointer"></i>
                    </div>
                    <textarea name="feedback" id="feedback" placeholder="Pesan/Kesan..." class="w-full border border-gray-200 p-2 rounded-lg"></textarea>
                </div>

                <div class="text-right py-4 px-6">
                    <button class="btn btn-danger-transparent" onclick="toggleModal('rate-modal', 'scale-0')"><i class="fas fa-times mr-2"></i>Cancel</button>
                    <button class="btn btn-success" onclick="toggleModal('rate-modal', 'scale-0')"><i class="fas fa-money-bill-wave-alt mr-2"></i>Rate</button>
                </div>
            </div>
        </div>

        <div id="preview-modal" class="absolute top-0 left-0 w-full h-full bg-black/30 transition scale-0">
            <div class="bg-white rounded-lg absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 divide-y divide-gray-300" style="width: 500px">
                <div class="flex items-center justify-between text-xl py-4 px-6">
                    <div>Makmur Rice Bow</div>
                    <div>
                        <i class="fas fa-times text-gray-300 cursor-pointer hover:text-danger" onclick="toggleModal('preview-modal', 'scale-0')"></i>
                    </div>
                </div>

                <div class="py-4 px-6">
                    <div class="h-80 overflow-hidden">
                        <img src="{{ asset('images/result/donald-snack.jpg') }}" alt="Preview Image" class="h-full object-cover object-center">
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-5xl font-bold opacity-40 rotate-45">Market'In</div>
                    </div>
                </div>

                <div class="text-right py-4 px-6">
                    <button class="btn btn-danger-transparent" onclick="toggleModal('preview-modal', 'scale-0')"><i class="fas fa-times mr-2"></i>Batal</button>
                    <button class="btn btn-success" onclick="toggleModal('preview-modal', 'scale-0')"><i class="fas fa-money-bill-wave-alt mr-2"></i>Bayar</button>
                </div>
            </div>
        </div>

        <div id="upload-form-modal" class="absolute top-0 left-0 w-full h-full bg-black/30 transition transform scale-0">
            <div class="bg-white rounded-lg absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 divide-y divide-gray-300" style="width: 500px">
                <div class="flex items-center justify-between text-xl py-4 px-6">
                    <div>Makmur Rice Bow</div>
                    <div>
                        <i class="fas fa-times text-gray-300 cursor-pointer hover:text-danger" onclick="toggleModal('upload-form-modal', 'scale-0')"></i>
                    </div>
                </div>

                <div class="py-4 px-6">
                    <div class="flex text-sm">
                        <input type="text" id="file-name" class="w-full py-2 px-6 rounded-l-lg bg-gray-100 flex-1 text-ellipsis" readonly>
                        <label for="upload-file" class="btn btn-primary rounded-l-none rounded-r-lg flex items-center">
                            <i class="fas fa-upload mr-2"></i>Upload File
                        </label>
                    </div>
                    <input type="file" id="upload-file" class="hidden" onchange="fileChanged(this)">
                </div>

                <div class="text-right py-4 px-6">
                    <button class="btn btn-danger-transparent" onclick="toggleModal('upload-form-modal', 'scale-0')"><i class="fas fa-times mr-2"></i>Batal</button>
                    <button class="btn btn-success" onclick="toggleModal('upload-form-modal', 'scale-0')"><i class="fas fa-upload mr-2"></i>Kirim</button>
                </div>
            </div>
        </div>

        <div id="accept-confirmation-modal" class="absolute top-0 left-0 w-full h-full bg-black/30 transition transform -translate-y-full">
            <div class="bg-white rounded-lg absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 divide-y divide-gray-300" style="width: 500px">
                <div class="flex items-center justify-between text-xl py-4 px-6">
                    <div>Makmur Rice Bow</div>
                    <div>
                        <i class="fas fa-times text-gray-300 cursor-pointer hover:text-danger" onclick="toggleModal('accept-confirmation-modal')"></i>
                    </div>
                </div>

                <div class="text-xl py-4 px-6">
                    Konfirmasi <b class="text-success">terima</b> lamaran dari <b>John</b>
                </div>

                <div class="text-right py-4 px-6">
                    <button class="btn btn-danger-transparent" onclick="toggleModal('accept-confirmation-modal')"><i class="fas fa-times mr-2"></i>Batal</button>
                    <button class="btn btn-success" onclick="toggleModal('accept-confirmation-modal')"><i class="fas fa-check mr-2"></i>Terima</button>
                </div>
            </div>
        </div>

        <div id="reject-confirmation-modal" class="absolute top-0 left-0 w-full h-full bg-black/30 transition transform -translate-y-full">
            <div class="bg-white rounded-lg absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 divide-y divide-gray-300" style="width: 500px">
                <div class="flex items-center justify-between text-xl py-4 px-6">
                    <div>Makmur Rice Bow</div>
                    <div>
                        <i class="fas fa-times text-gray-300 cursor-pointer hover:text-danger" onclick="toggleModal('reject-confirmation-modal')"></i>
                    </div>
                </div>

                <div class="text-xl py-4 px-6">
                    Konfirmasi <b class="text-danger">tolak</b> lamaran dari <b>John</b>
                </div>

                <div class="text-right py-4 px-6">
                    <button class="btn btn-danger-transparent" onclick="toggleModal('reject-confirmation-modal')"><i class="fas fa-times mr-2"></i>Batal</button>
                    <button class="btn btn-danger" onclick="toggleModal('reject-confirmation-modal')"><i class="fas fa-check mr-2"></i>Tolak</button>
                </div>
            </div>
        </div>
    </section>
@endsection
