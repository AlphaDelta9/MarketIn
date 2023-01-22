@extends('auth.layouts.app')
@section('title','Verifikasi Email')
@section('content')
<div class="px-2 auth-wrapper auth-v1">
    <div class="py-2 auth-inner">
        <div class="mb-0 card">
            <div class="card-body">
                <a href="javascript:void(0);" class="brand-logo">
                    <img src="/app-assets/images/favicon/favicon-32x32.png" alt="">
                    <h2 class="mb-0 ml-1 brand-text text-primary align-self-center">{{ env('APP_NAME') }}</h2>
                </a>
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        Kami telah mengirimkan email verifikasi ke alamat email {{ \Auth::user()->email }}.
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        Kamu sudah mengirimkan permintaan verifikasi ke {{ \Auth::user()->email }}, mohon menunggu 10 menit sebelum melakukan permintaan verifikasi email kembali.
                    </div>
                @endif
                <h4 class="mb-1 card-title">Cek email anda!</h4>
                <p class="mb-2 card-text">Sebelum melanjutkan, mohon verifikasikan alamat email anda, jika anda belum mendapatkan email verifikasi, <a href="{{ route('verification.resend') }}"> klik disini agar kami dapat mengirimkannya lagi.</a></p>

                <p class="mt-2 text-center">
                    <a href="{{ route('logout') }}"> <i data-feather="chevron-left"></i> Logout </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
