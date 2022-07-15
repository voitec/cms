@extends('layout')

@section('content')

    <!-- Section -->
    <section class="page-section">
        <div class="container relative">
            @include('helpers.messages')
            @auth
            <div class="row row-cols-auto mb-50">
                    <a href="{{ route('post.create') }}" class="mt-10 btn btn-mod btn-medium btn-round d-none d-sm-inline-block"><i class="fa fa-plus"></i> {{ __('Add new entry') }}</a>
            </div>
            @endauth

            <div class="row">

                <!-- Content -->
                <div class="col-sm-8">

                    <div class="row masonry">

                    @foreach($posts as $post)
                        @if((($post->status == 'public' && $post->category->status == 'public') || Gate::check('isWriter')) && $post->type == 'blog')
                            <!-- Post Item -->
                            <div class="col-md-6 col-lg-6 mb-60 mb-xs-40">

                                @if(!is_null($post->image))
                                    <div class="post-prev-img">
                                        <a href="{{ route('post.show', $post->id) }}"><img src="{{ Storage::url($post->image) }}"></a>
                                    </div>
                                @endif

                                <div class="post-prev-title font-alt">
                                    <a href="{{ route('post.show', $post->id) }}">{{ $post->name }}</a>
                                </div>

                                <div class="post-prev-info font-alt">
                                    {{ $post->created_at }} / {{ $post->category->name }} / {{ $post->user->name }}
                                </div>

                                <div class="post-prev-text">
                                    {{$post->preview}}
                                </div>

                                <div class="post-prev-more">
                                    <a href="{{ route('post.show', $post->id) }}" class="btn btn-mod btn-gray btn-round">{{ __('Read more') }} <i class="fa fa-angle-right"></i></a>
                                </div>

                            </div>
                            <!-- End Post Item -->
                            @endif
                        @endforeach

                    </div>

                </div>
                <!-- End Content -->

                <!-- Sidebar -->
                @include('posts.sidebar')
                <!-- End Sidebar -->
            </div>

        </div>
    </section>
    <!-- End Section -->
@endsection
