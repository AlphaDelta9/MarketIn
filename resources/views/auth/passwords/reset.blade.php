@extends('auth.layouts.app')
@section('title','Reset Password - '.env('APP_NAME'))
@section('content')
<div class="px-2 auth-wrapper auth-v1">
    <div class="py-2 auth-inner">
        <div class="mb-0 card">
            <div class="card-body">
                <a href="javascript:void(0);" class="brand-logo">
                    <img src="/app-assets/images/favicon/favicon-32x32.png" alt="">
                    <h2 class="mb-0 ml-1 brand-text text-primary align-self-center">{{ env('APP_NAME') }}</h2>
                </a>

                <h4 class="mb-1 card-title">Reset Password</h4>
                <p class="mb-2 card-text">Your new password should be different from previously used passwords</p>

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
                <form class="mt-2 auth-reset-password-form" action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <label for="login-email" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="login-email" name="email" placeholder="info@digitalkonsultindo.co.id" value="{{ $email ?? old('email') }}" readonly autocomplete="email" autofocus tabindex="1" />
                        @error('email')
                            <span id="login-email-error" class="error" style="">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <label for="reset-password-new">New Password</label>
                        </div>
                        <div class="input-group input-group-merge form-password-toggle @error('password') is-invalid @enderror">
                            <input type="password" class="form-control form-control-merge @error('password') error @enderror" id="reset-password-new" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="reset-password-new" tabindex="1" autofocus />
                            <div class="input-group-append">
                                <span class="cursor-pointer input-group-text"><i data-feather="eye"></i></span>
                            </div>
                        </div>
                        @error('password')
                            <span id="login-password-error" class="error" style="">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <label for="reset-password-confirm">Confirm Password</label>
                        </div>
                        <div class="input-group input-group-merge form-password-toggle">
                            <input type="password" class="form-control form-control-merge" id="reset-password-confirm" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="reset-password-confirm" tabindex="2" />
                            <div class="input-group-append">
                                <span class="cursor-pointer input-group-text"><i data-feather="eye"></i></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" tabindex="3">Set New Password</button>
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

        var pageResetPasswordForm = $('.auth-reset-password-form');

        // jQuery Validation
        // --------------------------------------------------------------------
        if (pageResetPasswordForm.length) {
            pageResetPasswordForm.validate({
                onkeyup: function (element) {
                  $(element).valid();
                },
                /*
                * ? To enable validation on focusout
                onfocusout: function (element) {
                  $(element).valid();
                }, */
                rules: {
                    'password': {
                        required: true
                    },
                    'password_confirmation': {
                        required: true,
                        equalTo: '#reset-password-new'
                    }
                }
            });
        }
    });

</script>
@endsection
