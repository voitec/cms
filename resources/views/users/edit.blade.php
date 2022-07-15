@extends('layout')

@section('content')

    <section class="page-section" id="create">
        <div class="container">
            <div class="row justify-content-center">
                <h2 class="section-title font-alt mb-70 mb-sm-40">
                    {{ __('Edit') }}
                </h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('forms.edit_user') }}</div>

                        <div class="card-body">
                            <form class="form" method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group row mb-20">
                                    <div class="col-md-4 col-form-label d-flex justify-content-end">
                                        <label for="name">{{ __('forms.name') }}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input value="{{ $user->name }}" id="name" type="text" maxlength="255" class="input-md form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                        <input value="{{ $user->email }}" id="name" type="text" maxlength="255" class="input-md form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-20">
                                    <div class="col-md-4 col-form-label d-flex justify-content-end">
                                        <label for="role">{{ __('forms.role') }}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select id="role" class="input-md form-control @error('role') is-invalid @enderror" name="role">
                                            @foreach($roles as $role)
                                                <option @if($user->role == $role) {{ 'selected' }} @endif value="{{ $role }}">{{ $role }}</option>
                                            @endforeach
                                        </select>

                                        @error('role')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-20">
                                    <div class="col-md-4 col-form-label d-flex justify-content-end">
                                        <label for="type">{{ __('forms.active') }}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select id="active" class="input-md form-control @error('active') is-invalid @enderror" name="active">
                                            <option @if($user->active == true) {{ 'selected' }} @endif value="1">1</option>
                                            <option @if($user->active == false) {{ 'selected' }} @endif value="0">0</option>
                                        </select>

                                        @error('active')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
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
