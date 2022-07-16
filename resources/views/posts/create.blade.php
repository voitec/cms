@extends('layout')

@section('content')

    <section class="page-section" id="create">
        <div class="container">
            <div class="row justify-content-center">
                <h2 class="section-title font-alt mb-70 mb-sm-40">
                    {{ __('Create') }}
                </h2>
            </div>
            <div class="row">

                <!-- Col -->

                <div class="col-sm-12">

                    <!-- Nav Tabs -->
                    <ul class="nav nav-tabs tpl-tabs animate" role="tablist">

                        <li class="nav-item">
                            <a href="#blog" aria-controls="blog" class="nav-link active" data-bs-toggle="tab" role="tab" aria-selected="true">Blog</a>
                        </li>

                        <li class="nav-item">
                            <a href="#portfolio" aria-controls="portfolio" class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false">Portfolio</a>
                        </li>

                    </ul>
                    <!-- End Nav Tabs -->

                    <!-- Tab panes -->
                    <div class="tab-content tpl-tabs-cont section-text">

                        <div class="tab-pane fade active show" id="blog" role="tabpanel">
                            <div class="card">
                                <div class="card-header">{{ __('forms.new_post') }}</div>

                                <div class="card-body">
                                    <form class="form" method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input id="status" type="hidden" name="status" value="private">
                                        <input id="type" type="hidden" name="type" value="blog">
                                        <input id="user_id" type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <div class="form-group row mb-20">
                                            <div class="col-md-4 col-form-label d-flex justify-content-end">
                                                <label for="name">{{ __('forms.name') }}</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input id="name" type="text" maxlength="500" class="input-md form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-20">
                                            <div class="col-md-4 col-form-label d-flex justify-content-end">
                                                <label for="preview">{{ __('forms.preview') }}</label>
                                            </div>
                                            <div class="col-md-8">
                                                <textarea id="preview" style="text-transform: none !important" rows="20" class="input-md form-control @error('preview') is-invalid @enderror" name="preview">{{ old('preview') }}</textarea>

                                                @error('preview')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-20">
                                            <div class="col-md-4 col-form-label d-flex justify-content-end">
                                                <label for="content">{{ __('forms.content') }}</label>
                                            </div>
                                            <div class="col-md-8">
                                                <textarea id="content" style="text-transform: none !important" rows="20" class="ckeditor input-md form-control @error('content') is-invalid @enderror" name="content">{{ old('content') }}</textarea>

                                                @error('content')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-20">
                                            <div class="col-md-4 col-form-label d-flex justify-content-end">
                                                <label for="type">{{ __('forms.category') }}</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select id="category_id" class="input-md form-control @error('category_id') is-invalid @enderror" name="category_id">
                                                    @foreach($blogCategories as $blogCategory)
                                                        <option value="{{ $blogCategory->id }}">{{ $blogCategory->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('category_id')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-20">
                                            <div class="col-md-4 col-form-label d-flex justify-content-end">
                                                <label for="image">{{ __('forms.image') }}</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input id="image" type="file" class="input-md form-control @error('image') is-invalid @enderror" name="image">

                                                @error('image')
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

                        <div class="tab-pane fade" id="portfolio" role="tabpanel">
                            <div class="card">
                                <div class="card-header">{{ __('forms.new_post') }}</div>

                                <div class="card-body">
                                    <form class="form" method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input id="status" type="hidden" name="status" value="private">
                                        <input id="type" type="hidden" name="type" value="portfolio">
                                        <input id="user_id" type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <div class="form-group row mb-20">
                                            <div class="col-md-4 col-form-label d-flex justify-content-end">
                                                <label for="name">{{ __('forms.name') }}</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input id="name" type="text" maxlength="500" class="input-md form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-20">
                                            <div class="col-md-4 col-form-label d-flex justify-content-end">
                                                <label for="preview">{{ __('forms.preview') }}</label>
                                            </div>
                                            <div class="col-md-8">
                                                <textarea id="preview" style="text-transform: none !important" rows="20" class="input-md form-control @error('preview') is-invalid @enderror" name="preview">{{ old('preview') }}</textarea>

                                                @error('preview')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-20">
                                            <div class="col-md-4 col-form-label d-flex justify-content-end">
                                                <label for="content">{{ __('forms.content') }}</label>
                                            </div>
                                            <div class="col-md-8">
                                                <textarea id="content" style="text-transform: none !important" rows="20" class="ckeditor input-md form-control @error('content') is-invalid @enderror" name="content">{{ old('content') }}</textarea>

                                                @error('content')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-20">
                                            <div class="col-md-4 col-form-label d-flex justify-content-end">
                                                <label for="type">{{ __('forms.category') }}</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select id="category_id" class="input-md form-control @error('category_id') is-invalid @enderror" name="category_id">
                                                    @foreach($portfolioCategories as $portfolioCategory)
                                                        <option value="{{ $portfolioCategory->id }}">{{ $portfolioCategory->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('category_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-20">
                                            <div class="col-md-4 col-form-label d-flex justify-content-end">
                                                <label for="image">{{ __('forms.image') }}</label>
                                            </div>
                                                <div class="col-md-6">
                                                    <input id="image" type="file" class="input-md form-control @error('image') is-invalid @enderror" name="image">

                                                    @error('image')
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
                    <!-- End Tab panes -->

                </div>

                <!-- End Col -->

            </div>
        </div>
    </section>
@endsection
