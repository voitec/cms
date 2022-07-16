@extends('layout')

@section('content')

    <section class="page-section" id="create">
        <div class="container">
            <div class="row justify-content-center">
                <h2 class="section-title font-alt mb-70 mb-sm-40">
                    {{ __('Create') }}
                </h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('forms.new_user') }}</div>

                        <div class="card-body">
                            <form class="form" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row mb-20">
                                    <div class="col-md-4 col-form-label d-flex justify-content-end">
                                        <label for="name">{{ __('forms.name') }}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input value="{{ old('name') }}" id="name" type="text" maxlength="255" class="input-md form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-20">
                                    <div class="col-md-4 col-form-label d-flex justify-content-end">
                                        <label for="email">{{ __('forms.email') }}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input value="{{ old('email') }}" id="name" type="text" maxlength="255" class="input-md form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-20">
                                    <div class="col-md-4 col-form-label d-flex justify-content-end">
                                        <label for="password">{{ __('Password') }}</label>
                                    </div>
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="input-md form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                </div>

                                <div class="form-group row mb-20">
                                    <div class="col-md-4 col-form-label d-flex justify-content-end">
                                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    </div>
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="input-md form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-mod btn-medium btn-round">
                                            {{ __('forms.save') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
