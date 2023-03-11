@extends('layouts.app')
@section('title','Register')
@include('layouts.navbar')
@section('content')
<section class="py-20">
    <div class="container">
        <div class="px-80">
            <div class="text-2xl font-bold mb-7">Register</div>
            <form action="{{ url('register/'.$role) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(session('message'))
                    <div class="px-4 py-3 mb-4 border-2 rounded-lg bg-danger-light border-danger text-danger">{{ session('message') }}</div>
                @endif
                <div class="mb-6 space-y-5">
                    <div>
                        <label for="name" class="block mb-2 text-sm">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="w-full px-3 py-2 transition border-b border-gray-400 focus:border-primary focus:outline-none">
                        @error('name')
                        <div class="mt-1 text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="w-full px-3 py-2 transition border-b border-gray-400 focus:border-primary focus:outline-none">
                        @error('email')
                        <div class="mt-1 text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm">Password</label>
                        <input type="password" id="password" name="password"
                        class="w-full px-3 py-2 transition border-b border-gray-400 focus:border-primary focus:outline-none">
                        @error('password')
                        <div class="mt-1 text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="block mb-2 text-sm">Konfirmasi Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                        class="w-full px-3 py-2 transition border-b border-gray-400 focus:border-primary focus:outline-none">
                        @error('password_confirmation')
                        <div class="mt-1 text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="city" class="block mb-2 text-base">Kota</label>
                        <input type="text" name="city" class="w-full px-3 py-2 transition border-b border-gray-400 focus:border-primary focus:outline-none" id=""
                        list="city" value="{{old('city')}}">
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
                        <label for="picture" class="block mb-2 text-sm">Picture</label>
                        <input type="file" id="picture" name="picture" accept="image/*"
                        class="w-full px-3 py-2 transition border-b border-gray-400 focus:border-primary focus:outline-none">
                        @error('picture')
                        <div class="mt-1 text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="profile" class="block mb-2 text-sm">Profile</label>
                        <textarea id="profile" name="profile" rows="10"
                        class="w-full px-3 py-2 transition border-b border-gray-400 focus:border-primary focus:outline-none">{{ old('profile') }}</textarea>
                        @error('profile')
                        <div class="mt-1 text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button class="block px-6 py-2 ml-auto text-white transition border rounded-lg bg-primary border-primary hover:bg-white hover:text-primary">Register</button>
            </form>
            <div class="text-center">
                Already have an account? <a class="underline" href="{{ url('login') }}"><strong>Login</strong></a>
            </div>
        </div>
    </div>
</section>
@endsection
