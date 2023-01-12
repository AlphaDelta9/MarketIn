@extends('app')

@section('title')
    Forum
@endsection

@section('content')
    <section class="py-20">
        <div class="container">
            <div class="text-2xl mb-2">Buat Thread Forum</div>
            <form action="{{ route('page.forum.index', ['id'=>1]) }}" method="POST" class="mt-4">
                @csrf
                @method('GET')
                <div class="space-y-5 mb-6">
                    <div>
                        <label for="title" class="block text-sm text-gray-400 mb-2">Judul Thread</label>
                        <input type="text" id="title" name="title" class="w-full py-2 px-5 bg-gray-100 rounded-lg" value="{{ old('title') }}">
                        @error('title')
                        <div class="text-danger text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="description" class="block text-sm text-gray-400 mb-2">Deskripsi</label>
                        <textarea id="description" name="description" rows="10"
                                  class="w-full py-2 px-5 bg-gray-100 rounded-lg">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="text-danger text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-primary block ml-auto">Submit</button>
            </form>
        </div>
    </section>
@endsection
