@extends('front.layouts.app')
@section('title','Profile')
@include('front.layouts.navbar')

@section('content')

    <section class="py-20">
        <div class="container">
            <div id="content-profile">
                {{-- <div class="tab-title">Profil</div> --}}
                <div class="grid grid-cols-2 gap-x-7">
                    <img class="h-full rounded-xl overflow-hidden" src="data:{{$user->mime}};base64,{{$user->picture}}" alt="Picture" srcset="">
                    <form action="{{url("profile/".$user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @if(session('message'))
                            <div class="bg-danger-light border-2 border-danger text-danger py-3 px-4 rounded-lg mb-4">{{ session('message') }}</div>
                        @endif
                        <div class="space-y-5 mb-6">
                            <div>
                                <label for="name" class="block text-base mb-2">Nama Lengkap</label>
                                <input type="text" id="name" name="name" value="{{old('name',$user->name)}}" class="w-full py-2 px-3 border-b border-gray-400 focus:border-primary focus:outline-none transition">
                                @error('name')
                                <div class="text-danger text-base mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-base mb-2">Email</label>
                                <input type="text" id="email" name="email" value="{{old('email',$user->email)}}" class="w-full py-2 px-3 border-b border-gray-400 focus:border-primary focus:outline-none transition">
                                @error('email')
                                <div class="text-danger text-base mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="password" class="block text-base mb-2">Password</label>
                                <input type="password" id="password" name="password" class="w-full py-2 px-3 border-b border-gray-400 focus:border-primary focus:outline-none transition">
                                @error('password')
                                <div class="text-danger text-base mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="password_confirmation" class="block text-base mb-2">Konfirmasi Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full py-2 px-3 border-b border-gray-400 focus:border-primary focus:outline-none transition">
                                @error('password_confirmation')
                                <div class="text-danger text-base mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="picture" class="block text-base mb-2">Picture</label>
                                <input type="file" id="picture" name="picture" accept="image/*" class="w-full py-2 px-3 border-b border-gray-400 focus:border-primary focus:outline-none transition">
                                @error('picture')
                                <div class="text-danger text-base mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="profile" class="block text-base mb-2">Profile</label>
                                <textarea id="profile" name="profile" rows="10"
                                class="w-full py-2 px-3 border-b border-gray-400 focus:border-primary focus:outline-none transition">{{ old('profile',$user->profile) }}</textarea>
                                @error('profile')
                                <div class="text-danger text-base mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button class="py-2 px-6 bg-primary text-white border border-primary hover:bg-white hover:text-primary rounded-lg transition block ml-auto">Save</button>
                    </form>
                </div>
            </div>

        </div>

        <div id="rate-modal" class="absolute top-0 left-0 w-full h-full bg-black/30 transition scale-0">
            <div class="bg-white rounded-lg absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 divide-y divide-gray-300" style="width: 500px">
                <div class="flex items-center justify-between text-xl py-4 px-6">
                    <div>Rate <b>Melvin</b></div>
                    <div>
                        <i class="fas fa-times  cursor-pointer hover:text-danger" onclick="toggleModal('rate-modal', 'scale-0')"></i>
                    </div>
                </div>

                <div class="py-4 px-6">
                    <div id="rating" class="flex text-3xl mb-3 space-x-2 rating">
                        <i class="fas fa-star  cursor-pointer"></i>
                        <i class="fas fa-star  cursor-pointer"></i>
                        <i class="fas fa-star  cursor-pointer"></i>
                        <i class="fas fa-star  cursor-pointer"></i>
                        <i class="fas fa-star  cursor-pointer"></i>
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
                        <i class="fas fa-times  cursor-pointer hover:text-danger" onclick="toggleModal('preview-modal', 'scale-0')"></i>
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
                        <i class="fas fa-times  cursor-pointer hover:text-danger" onclick="toggleModal('upload-form-modal', 'scale-0')"></i>
                    </div>
                </div>

                <div class="py-4 px-6">
                    <div class="flex text-base">
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
                        <i class="fas fa-times  cursor-pointer hover:text-danger" onclick="toggleModal('accept-confirmation-modal')"></i>
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
                        <i class="fas fa-times  cursor-pointer hover:text-danger" onclick="toggleModal('reject-confirmation-modal')"></i>
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
