@extends('app')

@section('title')
    Daftar
@endsection

@section('content')
    <section class="py-20">
        <div class="container">
            <div class="px-80">
                <div class="text-2xl font-bold mb-7">Register</div>
                <form action="{{ route('system.auth.register') }}" method="POST">
                    @csrf
                    @if(session('message'))
                        <div class="bg-danger-light border-2 border-danger text-danger py-3 px-4 rounded-lg mb-4">{{ session('message') }}</div>
                    @endif
                    <div class="space-y-5 mb-6">
                        <div>
                            <label for="name" class="block text-sm text-gray-500 mb-2">Nama Lengkap</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full py-2 px-3 border-b border-gray-400 focus:border-primary focus:outline-none transition">
                            @error('name')
                            <div class="text-danger text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="date_of_birth" class="block text-sm text-gray-500 mb-2">Tanggal Lahir</label>
                            <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" class="w-full py-2 px-3 border-b border-gray-400 focus:border-primary focus:outline-none transition">
                            @error('date_of_birth')
                            <div class="text-danger text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm text-gray-500 mb-2">Email</label>
                            <input type="text" id="email" name="email" value="{{ old('email') }}" class="w-full py-2 px-3 border-b border-gray-400 focus:border-primary focus:outline-none transition">
                            @error('email')
                            <div class="text-danger text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block text-sm text-gray-500 mb-2">Password</label>
                            <input type="password" id="password" name="password" class="w-full py-2 px-3 border-b border-gray-400 focus:border-primary focus:outline-none transition">
                            @error('password')
                            <div class="text-danger text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="password_confirmation" class="block text-sm text-gray-500 mb-2">Konfirmasi Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="w-full py-2 px-3 border-b border-gray-400 focus:border-primary focus:outline-none transition">
                            @error('password_confirmation')
                            <div class="text-danger text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="role_id" class="block text-sm text-gray-500 mb-2">Peran</label>
                            <select id="role_id" name="role_id" class="w-full py-2 px-3 border-b border-gray-400 focus:border-primary focus:outline-none transition">
                                <option value="">Pilih Peran</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" @if(old('role_id') == $role->id) selected @endif>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                            <div class="text-danger text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button class="py-2 px-6 bg-primary text-white border border-primary hover:bg-white hover:text-primary rounded-lg transition block ml-auto">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection
