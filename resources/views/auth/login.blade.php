@extends('layout')

@section('content')
    <section class="page-section" id="login">
        <div class="container relative">
            @include('helpers.messages')
            <h2 class="section-title font-alt mb-70 mb-sm-40">
                {{ __('Login') }}
            </h2>
            <div class="row">
                <form method="POST" action="{{ route('login') }}" class="form">
                    @csrf

                    <div class="row mb-3 justify-content-center">
                        <div class="col-md-6">
                            <input placeholder="{{ __('Email Address') }}" id="email" type="email" class="input-lg form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 justify-content-center">
                        <div class="col-md-6">
                            <input placeholder="{{ __('Password') }}" id="password" type="password" class="input-lg form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 justify-content-center">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3 justify-content-center">
                        <div class="col-md-6 align-center">
                            <button type="submit" class="btn btn-mod btn-large">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                    @if (Route::has('password.request'))
                        <div class="row mb-0 justify-content-center">
                            <div class="col-md-6 align-center">
                                <a class="link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </section>
@endsection
