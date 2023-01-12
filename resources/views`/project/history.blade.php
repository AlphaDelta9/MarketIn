@extends('app')

@section('title')
    Riwayat
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="grid grid-cols-2">
                <div class="text-2xl mb-2"><i class="fas fa-arrow-left mr-2"></i>Riwayat</div>
                <div>
                    <button class="block ml-auto">Sedang Proses</button>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-5">
                <div>
                    @include('components.cards.project-card')
                </div>
                <div>
                    @include('components.cards.project-card')
                </div>
                <div>
                    @include('components.cards.project-card')
                </div>
            </div>
        </div>
    </section>
@endsection
