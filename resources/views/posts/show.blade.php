@extends('layout')

@section('content')

    <!-- Section -->
    <section class="page-section">
        <div class="container relative">
            @include('helpers.messages')

            <div class="row">
                <div class="col-sm-12">
                    <div class="mb-20">
                        <a href="{{ route('post.edit', $post->id) }}" class="mt-10 btn btn-mod btn-medium btn-round d-none d-sm-inline-block">{{ __('Edit') }}</a>
                        <a href="{{ route('post.confirm', $post->id) }}" class="mt-10 btn btn-mod btn-medium btn-round d-none d-sm-inline-block">{{ __('Delete') }}</a>
                    </div>

                    <!-- Post -->
                    <div class="blog-item mb-80 mb-xs-40">

                        <!-- Text -->
                        <div class="blog-item-body">

                            <h1 class="mt-0 font-alt">{{ $post->name }}</h1>
                            <div class="post-prev-info font-alt">
                                {{ $post->created_at }} / {{ $post->category->name }} / {{ $post->user->name }}
                            </div>
                            @if(!is_null($post->image))
                                <div>
                                    <img style="" src="{{ Storage::url($post->image) }}">
                                </div>
                            @endif
                            <div class="lead">
                                <p>
                                    {{$post->preview}}
                                </p>
                            </div>
                            {!! $post->content !!}
                            <!-- End Text -->

                        </div>
                        <!-- End Text -->
                    </div>
                    <!-- End Post -->

                </div>
                <!-- End Content -->
            </div>

        </div>
    </section>
    <!-- End Section -->
@endsection
