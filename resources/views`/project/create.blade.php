@extends('app')

@section('title')
    Masuk
@endsection

@section('content')
    <section class="py-20">
        <div class="container">
            <div class="px-80">
                <div class="text-2xl font-bold mb-7">Buat Proyek</div>

                <form action="{{ route('page.profile', ['section' => 'project']) }}" method="POST">
                    @csrf
                    @method('GET')
                    <div class="space-y-5 mb-6">
                        <div>
                            <label for="title" class="block text-sm text-gray-400 mb-2">Nama Usaha</label>
                            <input type="text" id="title" name="title" class="w-full py-2 px-5 bg-gray-100 rounded-lg" value="{{ old('title') }}">
                            @error('title')
                            <div class="text-danger text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="type" class="block text-sm text-gray-400 mb-2">Jenis Usaha</label>
                            <select id="type" name="type" class="w-full py-2 px-5 bg-gray-100 rounded-lg">
                                <option value="">Pilih Jenis Usaha</option>
                                @foreach($types as $type)
                                    <option value="">{{ $type }}</option>
                                @endforeach
                            </select>
                            @error('type')
                            <div class="text-danger text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
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
                        </div>
                        <div>
                            <label for="description" class="block text-sm text-gray-400 mb-2">Deskripsi</label>
                            <textarea id="description" name="description" rows="10"
                                      class="w-full py-2 px-5 bg-gray-100 rounded-lg">{{ old('description') }}</textarea>
                            @error('name')
                            <div class="text-danger text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex space-x-4">
                            <div class="flex-1">
                                <label for="work_period" class="block text-sm text-gray-400 mb-2">Lama Pengerjaan</label>
                                <input type="number" id="work_period" name="work_period" class="w-full py-2 px-5 bg-gray-100 rounded-lg" value="{{ old('work_period', 0) }}">
                                @error('work_period')
                                <div class="text-danger text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex-1">
                                <label for="work_period_unit" class="block text-sm text-gray-400 mb-2">Satuan Lama Pengerjaan</label>
                                <select id="work_period_unit" name="work_period_unit" class="w-full py-2 px-5 bg-gray-100 rounded-lg">
                                    <option value="">Pilih Satuan</option>
                                    <option value="">Jam</option>
                                    <option value="">Hari</option>
                                    <option value="">Minggu</option>
                                    <option value="">Bulan</option>
                                </select>
                                @error('work_period_unit')
                                <div class="text-danger text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="budget" class="block text-sm text-gray-400 mb-2">Batas Budget</label>
                            <input type="int" id="budget" name="budget" class="w-full py-2 px-5 bg-gray-100 rounded-lg" value="{{ old('budget', 0) }}">
                            @error('budget')
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
