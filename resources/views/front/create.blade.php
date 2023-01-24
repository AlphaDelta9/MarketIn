@extends('front.layouts.app')

@section('title')
    Masuk
@endsection

@extends('front.layouts.navbar')

@section('content')
    <section class="py-20">
        <div class="container">
            <div class="px-80">
                <div class="text-2xl font-bold mb-7">Buat Proyek</div>

                <form action="{{ url()->current() }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-5 mb-6">
                        <div>
                            <label for="title" class="block text-sm text-gray-400 mb-2">Nama Project</label>
                            <input type="text" id="title" name="title" class="w-full py-2 px-5 bg-gray-100 rounded-lg" value="{{ old('title') }}">
                            @error('title')
                            <div class="text-danger text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="city" class="block text-sm text-gray-400 mb-2">Kota</label>
                            <input type="text" name="city" class="w-full py-2 px-5 bg-gray-100 rounded-lg" id=""
                            list="city" value="{{old('city')}}">
                            <datalist id="city">
                                @foreach($cities as $city)
                                    <option value="{{ $city->name }}">{{ $city->name }}</option>
                                @endforeach
                            </datalist>
                            @error('city')
                            <div class="text-danger text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div>
                            <label for="category" class="block text-sm text-gray-400 mb-2">Kategori Usaha</label>
                            <select id="category" name="category" class="w-full py-2 px-5 bg-gray-100 rounded-lg">
                                <option value="">Pilih Kategori Usaha</option>
                                @foreach($categories as $category)
                                    <option value="">{{ $category }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <div class="text-danger text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        <div>
                            <label for="description" class="block text-sm text-gray-400 mb-2">Deskripsi</label>
                            <textarea id="description" name="description" rows="10"
                                      class="w-full py-2 px-5 bg-gray-100 rounded-lg">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="text-danger text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="picture" class="block text-sm text-gray-500 mb-2">Picture</label>
                            <input type="file" id="picture" name="picture" accept="image/*" class="w-full py-2 px-3 border-b border-gray-400 focus:border-primary focus:outline-none transition">
                            @error('picture')
                            <div class="text-danger text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="work" class="block text-sm text-gray-400 mb-2">Waktu Pengerjaan</label>
                            <input type="date" id="work" name="work" class="w-full py-2 px-5 bg-gray-100 rounded-lg" value="{{ old('work') }}">
                            @error('work')
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
