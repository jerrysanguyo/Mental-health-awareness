@extends('layouts.auth.login-reg')

@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center align-items-center" style="height: 80vh;">
            <div class="col-lg-8 col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-body d-flex align-items-center" style="min-height: 300px;">
                        <div class="row w-100">
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <div class="text-center">
                                    <img src="{{ asset('image/IT.webp') }}" alt="" class="img-fluid">
                                </div>
                                <div class="vr ms-3 d-none d-md-block" style="height: 100%;"></div>
                            </div>
                            <div class="col-md-8">
                                <div class="row text-center">
                                    <span class="fs-1 ">Sign in</span>
                                    <span class="fs-6 text-body-secondary">Enter your email address and password to access admin panel.</span>
                                    <span class="fs-6 mb-4">
                                        <a href="{{ route('registration') }}" class="text-decoration-none">Kindly create your account if you do not have one.</a>
                                    </span>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="user_name" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                                        <div class="col-md-6">
                                            <input id="user_name" type="user_name" class="form-control @error('user_name') is-invalid @enderror"
                                            name="user_name" value="{{ old('user_name') }}" placeholder="Username"
                                            required autocomplete="user_name" autofocus>

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
                                            required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>

                                            
                                            <a href="{{ route('welcome') }}">
                                                <button class="btn btn-primary" type="button">Back</button>
                                            </a>
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
</body>
</html>
@endsection