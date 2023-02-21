@extends('front.layouts.app')
@section('title','Register - '.env('APP_NAME'))
@include('front.layouts.navbar')
@section('content')
<section class="py-20">
    <div class="container">
        <div class="px-80">
            <div class="text-2xl font-bold mb-7">Register</div>
            <form action="{{ url('register/'.$role) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(session('message'))
                    <div class="bg-danger-light border-2 border-danger text-danger py-3 px-4 rounded-lg mb-4">{{ session('message') }}</div>
                @endif
                <div class="space-y-5 mb-6">
                    <div>
                        <label for="name" class="block text-sm mb-2">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full py-2 px-3 border-b border-gray-400 focus:border-primary focus:outline-none transition">
                        @error('name')
                        <div class="text-danger text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm mb-2">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full py-2 px-3 border-b border-gray-400 focus:border-primary focus:outline-none transition">
                        @error('email')
                        <div class="text-danger text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm mb-2">Password</label>
                        <input type="password" id="password" name="password" class="w-full py-2 px-3 border-b border-gray-400 focus:border-primary focus:outline-none transition">
                        @error('password')
                        <div class="text-danger text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm mb-2">Konfirmasi Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="w-full py-2 px-3 border-b border-gray-400 focus:border-primary focus:outline-none transition">
                        @error('password_confirmation')
                        <div class="text-danger text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="city" class="block text-base mb-2">Kota</label>
                        <input type="text" name="city" class="w-full py-2 px-3 border-b border-gray-400 focus:border-primary focus:outline-none transition" id=""
                        list="city" value="{{old('city')}}">
                        <datalist id="city">
                            @foreach($cities as $city)
                                <option value="{{ $city->name }}">{{ $city->name }}</option>
                            @endforeach
                        </datalist>
                        @error('city')
                        <div class="text-danger text-base mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="picture" class="block text-sm mb-2">Picture</label>
                        <input type="file" id="picture" name="picture" accept="image/*" class="w-full py-2 px-3 border-b border-gray-400 focus:border-primary focus:outline-none transition">
                        @error('picture')
                        <div class="text-danger text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="profile" class="block text-sm mb-2">Profile</label>
                        <textarea id="profile" name="profile" rows="10"
                        class="w-full py-2 px-3 border-b border-gray-400 focus:border-primary focus:outline-none transition">{{ old('profile') }}</textarea>
                        @error('profile')
                        <div class="text-danger text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button class="py-2 px-6 bg-primary text-white border border-primary hover:bg-white hover:text-primary rounded-lg transition block ml-auto">Register</button>
            </form>
            <div class="text-center">
                Already have an account? <a class="underline" href="{{ url('login') }}"><strong>Login</strong></a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    $(function () {
        'use strict';

        var pageResetForm = $('.auth-register-form');

        // jQuery Validation
        // --------------------------------------------------------------------
        if (pageResetForm.length) {
            pageResetForm.validate({
                onkeyup: function (element) {
                  $(element).valid();
                },
                /*
                * ? To enable validation on focusout
                onfocusout: function (element) {
                  $(element).valid();
                }, */
                rules: {
                    'name': {
                        required: true
                    },
                    'email': {
                        required: true,
                        email: true
                    },
                    'password': {
                        required: true
                    },
                    'password_confirmation': {
                        required: true,
                        equalTo: '#password-new'
                    }
                }
            });
        }
    });

</script>
@endsection
