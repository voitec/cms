@extends('layout')

@section('content')

    <section class="page-section" id="create">
        <div class="container relative">
            <h2 class="section-title font-alt mb-70 mb-sm-40">
                {{ __('Create') }}
            </h2>
            <div class="row">
                <form method="POST" action="{{ route('section.store') }}" class="form">
                    @csrf
                    <input name="position" id="position" type="hidden" value="{{ $last+1 }}">
                    <input name="status" id="status" type="hidden" value="private">
                    <div class="row mb-3 justify-content-center">
                        <div class="col">
                            <input placeholder="{{ __('forms.name') }}" id="name" type="text" class="input-lg form-control @error('name') is-invalid @enderror" name="name" required autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 justify-content-center">
                        <div class="col">
                            <textarea style="text-transform: none !important" rows="20" placeholder="{{ __('forms.content') }}" id="content" class="ckeditor input-lg form-control @error('content') is-invalid @enderror" name="content"></textarea>

                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 justify-content-center">
                        <div class="col-md-6 align-center">
                            <button type="submit" class="btn btn-mod btn-large">
                                {{ __('forms.save') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
