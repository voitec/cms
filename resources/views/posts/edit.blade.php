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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('forms.post_edit') }}</div>

                        <div class="card-body">
                            <form class="form" method="POST" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <input id="type" type="hidden" name="type" value="{{ $post->type }}">
                                <input id="user_id" type="hidden" name="user_id" value="{{ $post->user_id }}">
                                <div class="form-group row mb-20">
                                    <div class="col-md-4 col-form-label d-flex justify-content-end">
                                        <label for="name">{{ __('forms.name') }}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="name" type="text" maxlength="500" class="input-md form-control @error('name') is-invalid @enderror" name="name" value="{{ $post->name }}" required autocomplete="name" autofocus>

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
                                        <textarea id="preview" style="text-transform: none !important" rows="20" class="input-md form-control @error('preview') is-invalid @enderror" name="preview">{{ $post->preview }}</textarea>
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
                                        <textarea id="content" style="text-transform: none !important" rows="20" class="ckeditor input-md form-control @error('content') is-invalid @enderror" name="content">{{ $post->content }}</textarea>

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
                                            @if($post->type == 'blog')
                                                @foreach($blogCategories as $blogCategory)
                                                    <option @if($post->category->name == $blogCategory->name) {{ 'selected' }} @endif value="{{ $blogCategory->id }}">{{ $blogCategory->name }}</option>
                                                @endforeach
                                            @else
                                                @foreach($portfolioCategories as $portfolioCategory)
                                                    <option @if($post->category->name == $portfolioCategory->name) {{ 'selected' }} @endif value="{{ $portfolioCategory->id }}">{{ $portfolioCategory->name }}</option>
                                                @endforeach
                                            @endif

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
                                        <label for="status">{{ __('forms.status') }}</label>
                                    </div>
                                    <div class="col-md-6">
                                            <select id="status" class="input-md form-control @error('status') is-invalid @enderror" name="status">
                                                <option @if($post->status == 'public') {{ 'selected' }} @endif value="public">Public</option>
                                                <option @if($post->status == 'private') {{ 'selected' }} @endif value="private">Private</option>
                                            </select>

                                        @error('status')
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

                                @if(!is_null($post->image))
                                    <div class="form-group row mb-20">
                                        <div class="col-md-6 offset-md-4">
                                            <img src="{{ Storage::url($post->image) }}" alt="Work">
                                        </div>
                                    </div>
                                @endif

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
