@extends('layout')

@section('content')

    <section class="page-section" id="edit">
        <div class="container relative">
            <h2 class="section-title font-alt mb-70 mb-sm-40">
                {{ __('Edit') }}
            </h2>
            <div class="row">
                <form method="POST" action="{{ route('section.update', $section->id) }}" class="form">
                    @method('PUT')
                    @csrf

                    <div class="row mb-3 justify-content-center">
                        <div class="col">
                            <input value="{{ $section->name }}" placeholder="{{ __('forms.name') }}" id="name" type="text" class="input-lg form-control @error('name') is-invalid @enderror" name="name" required autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 justify-content-center">
                        <div class="col">
                            <textarea style="text-transform: none !important" rows="20" placeholder="{{ __('forms.content') }}" id="content" class="ckeditor input-lg form-control @error('content') is-invalid @enderror" name="content">{!! $section->content !!}</textarea>

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
