@extends('layouts.app')
@section('title','Login')
@include('layouts.navbar')
@section('content')
<section class="py-20">
    <div class="container">
        <div class="px-80">
            <div class="text-2xl font-bold mb-7">Login</div>
            <form action="{{ url('login') }}" method="POST">
                @csrf
                @if(session('message'))
                    <div class="px-4 py-3 mb-4 border-2 rounded-lg bg-danger-light border-danger text-danger">{{ session('message') }}</div>
                @endif
                <div class="mb-6 space-y-5">
                    <div>
                        <label for="email" class="block mb-2 text-sm">Email</label>
                        <input type="text" id="email" name="email" value="{{ old('email') }}"
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
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="remember-me"
                        name="remember" />
                        <label class="custom-control-label" for="remember-me"> Remember Me </label>
                    </div>
                </div>
                <button class="block ml-auto btn btn-primary">Login</button>
            </form>
            <div class="text-center">
                Not registered yet? <a class="underline" href="{{ url('register') }}">
                    <strong>Create an Account</strong></a>
            </div>
        </div>
    </div>
</section>
@endsection
