@extends('app')

@section('title')
    Profil
@endsection

@section('content')
    @php
        $user = getUser();
    @endphp

    <section class="py-20">
        <div class="container">
            <div class="tab-container">
                @php
                    $tabMenus = ['profile','project'];
                    $section = strtolower(request()->query('section'));
                    $activeMenu = in_array($section, $tabMenus) ? $section : $tabMenus[0];
                @endphp

                @foreach($tabMenus as $tabMenu)
                    <input type="radio" id="{{ $tabMenu }}" name="tab_menu" @if($activeMenu == $tabMenu) checked @endif>
                @endforeach

                <div class="tab-menu">
                    <label for="profile">Profil</label>
                    <label for="project">Proyek</label>
                </div>

                <div class="tab-content py-7">
                    <div id="content-profile">
                        <div class="tab-title">Profil</div>

                        <div>
                            <div class="text-xl font-bold">{{ $user->name }}</div>
                            <div>{{ $user->email }}</div>
                        </div>
                    </div>
                    <div id="content-project">
                        <div>
                            @if($user->role->name == 'pengguna')
                                <div class="flex items-center mb-4">
                                    <div class="flex-1 tab-title">Proyek</div>
                                    <div class="flex-1 text-right">
                                        <a href="{{ route('page.project.create') }}" class="btn btn-primary">Buat</a>
                                    </div>
                                </div>

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td>Nama Proyek</td>
                                        <td>Jenis Usaha</td>
                                        <td>Kategori Usaha</td>
                                        <td>Periode Pengerjaan</td>
                                        <td>Batas Budget</td>
                                        <td>Status</td>
                                        <td></td>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($projects as $project)
                                        @php
                                            $class = '';
                                            switch($project['status']){
                                                case 'dibayar':
                                                case 'selesai':
                                                    $class = 'text-success';
                                                    break;
                                                case 'menunggu':
                                                    $class = 'text-warning';
                                                    break;
                                                case 'mencari':
                                                    $class = 'text-danger';
                                                    break;
                                            }
                                        @endphp
                                        <tr>
                                            <td>{{ $project['name'] }}</td>
                                            <td>{{ $project['type'] }}</td>
                                            <td>{{ $project['category'] }}</td>
                                            <td>{{ $project['work_period'] }}</td>
                                            <td>{{ convertCurrency($project['budget']) }}</td>
                                            <td class="{{ $class }} font-bold capitalize">{{ $project['status'] }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <span class="fas fa-list transition hover:text-primary"></span>
                                                    <ul class="px-2">
                                                        @switch($project['status'])
                                                            @case('dibayar')
                                                            <li>
                                                                <div class="font-bold pt-1 px-2 text-success">Dibayar</div>
                                                                <div class="flex py-2">
                                                                    <div class="flex-1 px-4 border-r border-gray-200">
                                                                        <a href="{{ route('page.users.detail', ['id' => 2]) }}" class="hover:text-primary">Melvin</a>
                                                                    </div>
                                                                    <div class="flex px-3 space-x-2">
                                                                        <div class="flex-1">
                                                                            <i class="fas fa-download text-gray-500 cursor-pointer transition opacity-40 hover:opacity-100"></i>
                                                                        </div>
                                                                        <div class="flex-1">
                                                                            <i class="fas fa-star-half-alt text-gray-500 cursor-pointer transition opacity-40 hover:opacity-100" onclick="toggleModal('rate-modal', 'scale-0')"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            @break

                                                            @case('selesai')
                                                            <li>
                                                                <div class="font-bold pt-1 px-2 text-success">Selesai</div>
                                                                <div class="flex py-2">
                                                                    <div class="flex-1 px-4 border-r border-gray-200">
                                                                        <a href="{{ route('page.users.detail', ['id' => 2]) }}" class="hover:text-primary">Melvin</a>
                                                                    </div>
                                                                    <div class="px-3">
                                                                        <i class="fas fa-eye text-gray-500 cursor-pointer transition opacity-40 hover:opacity-100" onclick="toggleModal('preview-modal', 'scale-0')"></i>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            @break

                                                            @case('menunggu')
                                                            <li>
                                                                <div class="font-bold pt-1 px-2 text-warning">Proses</div>
                                                                <div class="py-2 px-4">
                                                                    <a href="{{ route('page.users.detail', ['id' => 2]) }}" class="hover:text-primary">Melvin</a>
                                                                </div>
                                                            </li>
                                                            @break

                                                            @case('mencari')
                                                            <li>
                                                                <div class="font-bold py-1 px-2 text-danger">Lamaran</div>
                                                                <div class="flex py-2">
                                                                    <div class="flex-1 px-4 border-r border-gray-200">
                                                                        <a href="{{ route('page.users.detail', ['id' => 2]) }}" class="hover:text-primary">Melvin</a>
                                                                    </div>
                                                                    <div class="flex px-3 space-x-2">
                                                                        <div class="flex-1">
                                                                            <i class="fas fa-check text-success cursor-pointer transition opacity-40 hover:opacity-100" onclick="toggleModal('accept-confirmation-modal')"></i>
                                                                        </div>
                                                                        <div class="flex-1">
                                                                            <i class="fas fa-times text-danger cursor-pointer transition opacity-40 hover:opacity-100" onclick="toggleModal('reject-confirmation-modal')"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            @break
                                                        @endswitch
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="tab-title mb-4">Proyek</div>

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td>Nama Proyek</td>
                                        <td>Jenis Usaha</td>
                                        <td>Batas Budget</td>
                                        <td>Status</td>
                                        <td></td>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($projects as $project)
                                        <tr>
                                            <td><a href="{{ route('page.project.detail', ['id' => 1]) }}" class="text-primary hover:text-primary-dark">{{ $project['name'] }}</a></td>
                                            <td>{{ $project['type'] }}</td>
                                            <td>{{ convertCurrency($project['budget']) }}</td>
                                            <td class="text-success font-bold">Accepted</td>
                                            <td>
                                                <i class="fas fa-upload text-gray-500 cursor-pointer transition opacity-30 hover:opacity-100" onclick="toggleModal('upload-form-modal', 'scale-0')"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="{{ route('page.project.detail', ['id' => 1]) }}" class="text-primary hover:text-primary-dark">{{ $project['name'] }}</a></td>
                                            <td>{{ $project['type'] }}</td>
                                            <td>{{ convertCurrency($project['budget']) }}</td>
                                            <td class="text-warning font-bold">Pending</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
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
