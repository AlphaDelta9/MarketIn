@extends('front.layouts.app')
@section('title','Profile')
@include('front.layouts.navbar')

@section('content')

    <section class="py-20">
        <div class="container">
            <div id="content-profile">
                {{-- <div class="tab-title">Profil</div> --}}
                <div class="grid grid-cols-2 gap-x-7">
                    <img class="h-full overflow-hidden rounded-xl" src="data:{{$user->mime}};base64,{{$user->picture}}" alt="Picture" srcset="">
                    <form action="{{url("profile/".$user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @if(session('message'))
                            <div class="px-4 py-3 mb-4 border-2 rounded-lg bg-danger-light border-danger text-danger">{{ session('message') }}</div>
                        @endif
                        <div class="mb-6 space-y-5">
                            <div>
                                <label for="name" class="block mb-2 text-base">Nama Lengkap</label>
                                <input type="text" id="name" name="name" value="{{old('name',$user->name)}}" class="w-full px-3 py-2 transition border-b border-gray-400 focus:border-primary focus:outline-none">
                                @error('name')
                                <div class="mt-1 text-base text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-base">Email</label>
                                <input type="text" id="email" name="email" value="{{old('email',$user->email)}}" class="w-full px-3 py-2 transition border-b border-gray-400 focus:border-primary focus:outline-none">
                                @error('email')
                                <div class="mt-1 text-base text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-base">Password</label>
                                <input type="password" id="password" name="password" class="w-full px-3 py-2 transition border-b border-gray-400 focus:border-primary focus:outline-none">
                                @error('password')
                                <div class="mt-1 text-base text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="password_confirmation" class="block mb-2 text-base">Konfirmasi Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-3 py-2 transition border-b border-gray-400 focus:border-primary focus:outline-none">
                                @error('password_confirmation')
                                <div class="mt-1 text-base text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="city" class="block mb-2 text-base">Kota</label>
                                <input type="text" name="city" class="w-full px-3 py-2 transition border-b border-gray-400 focus:border-primary focus:outline-none" id=""
                                list="city" value="{{old('city',$user->city_name)}}">
                                <datalist id="city">
                                    @foreach($cities as $city)
                                        <option value="{{ $city->name }}">{{ $city->name }}</option>
                                    @endforeach
                                </datalist>
                                @error('city')
                                <div class="mt-1 text-base text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="picture" class="block mb-2 text-base">Picture</label>
                                <input type="file" id="picture" name="picture" accept="image/*" class="w-full px-3 py-2 transition border-b border-gray-400 focus:border-primary focus:outline-none">
                                @error('picture')
                                <div class="mt-1 text-base text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="profile" class="block mb-2 text-base">Profile</label>
                                <textarea id="profile" name="profile" rows="10"
                                class="w-full px-3 py-2 transition border-b border-gray-400 focus:border-primary focus:outline-none">{{ old('profile',$user->profile) }}</textarea>
                                @error('profile')
                                <div class="mt-1 text-base text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button class="block px-6 py-2 ml-auto text-white transition border rounded-lg bg-primary border-primary hover:bg-white hover:text-primary">Save</button>
                    </form>
                </div>
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
                    <div class="flex text-base">
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
