@extends('front.layouts.app')
@section('title','Login - '.env('APP_NAME'))
@include('front.layouts.navbar')
@section('content')
<section class="py-20">
    <div class="container">
        <div class="px-80">
            <div class="text-2xl font-bold mb-7">Login</div>
            <form action="{{ url('login') }}" method="POST">
                @csrf
                @if(session('message'))
                    <div class="bg-danger-light border-2 border-danger text-danger py-3 px-4 rounded-lg mb-4">{{ session('message') }}</div>
                @endif
                <div class="space-y-5 mb-6">
                    <div>
                        <label for="email" class="block text-sm text-gray-400 mb-2">Email</label>
                        <input type="text" id="email" name="email" value="{{ old('email') }}" class="w-full py-2 px-3 border-b border-gray-400 focus:border-primary focus:outline-none transition">
                        @error('email')
                        <div class="text-danger text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm text-gray-400 mb-2">Password</label>
                        <input type="password" id="password" name="password" class="w-full py-2 px-3 border-b border-gray-400 focus:border-primary focus:outline-none transition">
                        @error('password')
                        <div class="text-danger text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="remember-me" tabindex="3" name="remember" />
                        <label class="custom-control-label" for="remember-me"> Remember Me </label>
                    </div>
                </div>
                <button class="btn btn-primary block ml-auto">Login</button>
            </form>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script>
        $(function () {
            'use strict';

            var pageLoginForm = $('.auth-login-form');

            // jQuery Validation
            // --------------------------------------------------------------------
            if (pageLoginForm.length) {
                pageLoginForm.validate({
                    onkeyup: function (element) {
                        $(element).valid();
                    },
                    /*
                    * ? To enable validation on focusout
                    onfocusout: function (element) {
                        $(element).valid();
                    }, */
                    rules: {
                        'email': {
                            required: true,
                            email: true
                        },
                        'password': {
                            required: true
                        }
                    }
                });
            }
        });
    </script>
@endsection
