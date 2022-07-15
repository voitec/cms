@extends('layout')

@section('content')
    <section class="page-section" id="login">
        <div class="container relative">
            @include('helpers.messages')
            <h2 class="section-title font-alt mb-70 mb-sm-40">
                {{ __('Login') }}
            </h2>
            <div class="row">
                <form method="POST" action="{{ route('password.email') }}" class="form">
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
                        <div class="col-md-6 align-center">
                            <button type="submit" class="btn btn-mod btn-large">
                                {{ __('Send') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
