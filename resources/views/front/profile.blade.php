@extends('layouts.app')
@section('title','Profile')
@include('layouts.navbar')

@section('content')

    <section class="py-20">
        <div class="container">
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

    </section>
@endsection
