@extends('auth.layouts.app')
@section('title','Forgot Password - '.env('APP_NAME'))
@section('content')
<div class="px-2 auth-wrapper auth-v1">
    <div class="py-2 auth-inner">
        <div class="mb-0 card">
            <div class="card-body">
                <a href="javascript:void(0);" class="brand-logo">
                    <img src="/app-assets/images/favicon/favicon-32x32.png" alt="">
                    <h2 class="mb-0 ml-1 brand-text text-primary align-self-center">{{ env('APP_NAME') }}</h2>
                </a>

                <h4 class="mb-1 card-title">Forgot Password?</h4>
                <p class="mb-2 card-text">Enter your email and we'll send you instructions to reset your password</p>

                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <div class="alert-body">
                        {{ session('status') }}
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @endif
                <form class="mt-2 auth-forgot-password-form" action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="login-email" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="login-email"
                            name="email" placeholder="info@digitalkonsultindo.co.id" value="{{ old('email') }}"
                            autocomplete="email" autofocus tabindex="1" />
                        @error('email')
                        <span id="login-email-error" class="error" style="">{{ $message }}</span>
                        @enderror
                    </div>
                    <button class="btn btn-primary btn-block" tabindex="2">Send reset link</button>
                </form>

                <p class="mt-2 text-center">
                    <a href="{{ route('login') }}"> <i data-feather="chevron-left"></i> Back to login </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function () {
        'use strict';

        var pageForgotPasswordForm = $('.auth-forgot-password-form');

        // jQuery Validation
        // --------------------------------------------------------------------
        if (pageForgotPasswordForm.length) {
            pageForgotPasswordForm.validate({
                onkeyup: function (element) {
                    $(element).valid();
                },
                /*
                * ? To enable validation on focusout
                onfocusout: function (element) {
                    $(element).valid();
                }, */
                rules: {
                    'forgot-password-email': {
                        required: true,
                        email: true
                    }
                }
            });
        }
    });

</script>
@endsection
