@extends('layouts.app')
@section('title','Pembayaran')
@extends('layouts.navbar')

@section('content')
    <section class="py-12">
        <div class="container">
            <div class="px-80">
                <div class="text-2xl font-bold mb-7">Pembayaran</div>

                <form action="{{ url('/pay/'.$project->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-6 space-y-5">
                        <div>
                            <label for="id" class="block mb-2 text-base">Id Transaksi</label>
                            <input type="text" id="id" name="id" class="w-full px-5 py-2 rounded-lg" value="{{ $transaction }}" disabled>
                        </div>
                        <div>
                            <label for="title" class="block mb-2 text-base">Nama Project</label>
                            <input type="text" id="title" name="title" class="w-full px-5 py-2 rounded-lg" value="{{ $project->project_header->title }}" disabled>
                        </div>
                        <div>
                            <label for="receipt" class="block mb-2 text-base">Bukti Pembayaran</label>
                            <input type="file" id="receipt" name="receipt" accept="image/*" class="w-full px-3 py-2 transition border-b border-gray-400 focus:border-primary focus:outline-none">
                            @error('receipt')
                            <div class="mt-1 text-base text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="price" class="block mb-2 text-base">Harga</label>
                            <input type="number" id="price" name="price" class="w-full px-5 py-2 rounded-lg" value="{{ old('price',$project->project_header->budget) }}" min="0">
                            @error('price')
                            <div class="mt-1 text-base text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button class="block ml-auto btn btn-primary">Pay</button>
                </form>
            </div>
        </div>
    </section>
@endsection
