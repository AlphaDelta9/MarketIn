@extends('layouts.app')
@section('title','Buat Proyek')
@include('layouts.navbar')

@section('content')
    <section class="py-20">
        <div class="container">
            <div class="px-80">
                <div class="text-2xl font-bold mb-7">Buat Proyek</div>

                <form action="{{ url()->current() }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6 space-y-5">
                        <div>
                            <label for="title" class="block mb-2 text-base">Nama Project</label>
                            <input type="text" id="title" name="title" class="w-full px-5 py-2 rounded-lg" value="{{ old('title') }}">
                            @error('title')
                            <div class="mt-1 text-base text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="city" class="block mb-2 text-base">Area @if(request()->type == 'Iklan') Pemasaran @endif</label>
                            <input type="text" name="city" class="w-full px-5 py-2 rounded-lg" id=""
                            list="city" value="{{old('city',auth()->user()->city_name)}}">
                            <datalist id="city">
                                @foreach($cities as $city)
                                    <option value="{{ $city->name }}">{{ $city->name }}</option>
                                @endforeach
                            </datalist>
                            @error('city')
                            <div class="mt-1 text-base text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div>
                            <label for="category" class="block mb-2 text-base">Kategori Usaha</label>
                            <select id="category" name="category" class="w-full px-5 py-2 rounded-lg">
                                <option value="">Pilih Kategori Usaha</option>
                                @foreach($categories as $category)
                                    <option value="">{{ $category }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <div class="mt-1 text-base text-danger">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        <div>
                            <label for="description" class="block mb-2 text-base">Deskripsi</label>
                            <textarea id="description" name="description" rows="10"
                                      class="w-full px-5 py-2 rounded-lg">{{ old('description',"\n\n\n".auth()->user()->name."\n\n".auth()->user()->profile) }}</textarea>
                            @error('description')
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
                        @if (request()->type == 'Iklan')
                        <div>
                            <label for="asset" class="block mb-2 text-base">Asset</label>
                            <input type="file" id="asset" name="asset" class="w-full px-3 py-2 transition border-b border-gray-400 focus:border-primary focus:outline-none">
                            @error('asset')
                            <div class="mt-1 text-base text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @endif
                        <div>
                            <label for="work" class="block mb-2 text-base">@if(request()->type == 'Iklan') Batas Promosi Konten @else Batas Pengerjaan @endif</label>
                            <input type="date" id="work" name="work" class="w-full px-5 py-2 rounded-lg" value="{{ old('work') }}">
                            @error('work')
                            <div class="mt-1 text-base text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="budget" class="block mb-2 text-base">Batas Budget</label>
                            <input type="number" id="budget" name="budget" class="w-full px-5 py-2 rounded-lg" value="{{ old('budget') }}" min="0">
                            @error('budget')
                            <div class="mt-1 text-base text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button class="block ml-auto btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection
