@extends('layouts.app')
@section('title','Homepage')
@include('layouts.navbar')
@section('content')

	<section class="section" id="">
		<div class="container">
            <div class="grid grid-cols-2 gap-5">
                <a href="{{ url('register/pengguna') }}"
                class="block mb-2 font-bold text-center transition hover:text-primary">
                    <div class="block px-4 py-6 text-2xl border rounded btn border-primary">
                    Register sebagai UMKM
                    </div>
                </a>
                <a href="{{ url('register/penyedia') }}"
                class="block mb-2 font-bold text-center transition hover:text-primary">
                    <div class="block px-4 py-6 text-2xl border rounded btn border-primary">
                    Register sebagai Freelancer
                    </div>
                </a>
                <a href="{{ url('login') }}" class="block col-span-2 mb-2 transition hover:text-primary">
                    <div class="block px-4 py-6 text-2xl font-bold text-center border rounded btn btn-primary">
                        Login
                    </div>
                </a>
            </div>
		</div>
	</section>

@endsection
