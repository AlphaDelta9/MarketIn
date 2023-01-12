@extends('app')

@section('title')
    Masuk
@endsection

@section('content')
    <section class="py-20">
        <div class="container">
            <div class="px-80">
                <div class="text-2xl font-bold mb-7">Login</div>
                <form action="{{ route('system.auth.login') }}" method="POST">
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
                    </div>
                    <button class="btn btn-primary block ml-auto">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection
