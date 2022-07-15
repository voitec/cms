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
                        <div class="card-header">{{ __('forms.edit_category') }}</div>

                        <div class="card-body">
                            <form class="form" method="POST" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group row mb-20">
                                    <div class="col-md-4 col-form-label d-flex justify-content-end">
                                        <label for="name">{{ __('forms.name') }}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input value="{{ $category->name }}" id="name" type="text" maxlength="255" class="input-md form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-20">
                                    <div class="col-md-4 col-form-label d-flex justify-content-end">
                                        <label for="type">{{ __('forms.type') }}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select id="type" class="input-md form-control @error('type') is-invalid @enderror" name="type">
                                            <option @if($category->type == 'blog') {{ 'selected' }} @endif value="blog">Blog</option>
                                            <option @if($category->type == 'portfolio') {{ 'selected' }} @endif value="portfolio">Portfolio</option>
                                        </select>

                                        @error('type')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

{{--                                <div class="form-group row mb-20">--}}
{{--                                    <div class="col-md-4 col-form-label d-flex justify-content-end">--}}
{{--                                        <label for="type">{{ __('shop.product.fields.name') }}</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <select id="status" class="input-md form-control @error('type') is-invalid @enderror" name="type">--}}
{{--                                            <option @if($category->status == 'private') {{ 'selected' }} @endif value="private">Private</option>--}}
{{--                                            <option @if($category->status == 'public') {{ 'selected' }} @endif value="public">Public</option>--}}
{{--                                        </select>--}}

{{--                                        @error('status')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}

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
