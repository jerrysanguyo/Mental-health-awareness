@extends('layouts.auth.login-reg')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 80vh;">
        <div class="col-md-8">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 d-flex justify-content-center align-items-center">
                            <div class="text-center">
                                <img src="{{ asset('image/IT.webp') }}" alt="" class="img-fluid">
                            </div>
                            <div class="vr ms-3" style="height: 100%;"></div> 
                        </div>
                        <div class="col-md-8">
                            <div class="row text-center">
                                <span class="fs-1 ">Registration</span>
                                <span class="fs-6 text-body-secondary">Don't have an account? Create your <br> account, it takes less than a minute.</span>
                                <span class="fs-6 mb-4">
                                    <a href="{{ route('Login') }}" class="text-decoration-none">Already have an account</a>
                                </span>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-end">{{ __('Full name') }}</label>
                                    <div class="col-md-6">
                                        <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror"
                                        name="full_name" value="{{ old('full_name') }}" placeholder="Full name"
                                        required autocomplete="full_name" autofocus>

                                        @error('full_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="user_name" class="col-md-4 col-form-label text-md-end">{{ __('User name') }}</label>
                                    <div class="col-md-6">
                                        <input id="user_name" type="user_name" class="form-control @error('user_name') is-invalid @enderror"
                                        name="user_name" placeholder="User name"
                                        value="{{ old('user_name') }}" required autocomplete="user_name">

                                        @error('user_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" placeholder="Password"
                                        required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" placeholder="Confirm password"
                                        required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
