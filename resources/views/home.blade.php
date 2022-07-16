@extends('layout')

@section('content')
    <!-- Home Section -->
    <section class="home-section bg-gray parallax-2" data-background="{{ asset(config('cms.background_img')) }}" id="home">
        <div class="js-height-full">

            <!-- Hero Content -->
            <div class="home-content container">
                <div class="home-text">

                    <h1 class="hs-line-8 font-alt mb-50 mb-xs-30">{{ config('cms.person') }}</h1>
                    <h2 class="hs-line-11 font-alt mb-50 mb-xs-30"> {{ config('cms.description') }}</h2>

{{--                    <div class="local-scroll">--}}
{{--                        <a href="#about" class="btn btn-mod btn-medium btn-round d-none d-sm-inline-block">O mnie</a>--}}
{{--                    </div>--}}

                </div>
            </div>
            <!-- End Hero Content -->

            <!-- Scroll Down -->
            <div class="local-scroll">
                @if(!is_null($sections->first()))
                <a href="#{{ str_replace(' ', '-', $sections->first()->name) }}" class="scroll-down"><i class="fa fa-angle-down scroll-down-icon"></i><span class="sr-only">Scroll to the next section</span></a>
                @endif
            </div>
            <!-- End Scroll Down -->

        </div>
    </section>
    <!-- End Home Section -->
    @can('isAdmin')
        <div class="container relative mt-50">
            @include('helpers.messages')
            <div class="row border mb-10 mt-10 progress-color align-items-center">
                <div class="col-auto mt-1 mb-1">
                    <p class="font-alt mb-0"><b>{{ __('sections.section_count') }}:</b> {{ $sections->count() }}</p>
                </div>
                <div class="col-auto mt-1 mb-1 font-alt">
                    <a class="btn btn-mod btn-medium btn-round" href="{{ route('section.create') }}"><i class="fa fa-plus"></i> {{ __('sections.add_new_section') }}</a>
                </div>
            </div>
        </div>
    @endcan
    @foreach($sections as $section)
        @if($section->status == 'public' || Gate::check('isAdmin'))
            <section id="{{ str_replace(' ', '-', $section->name) }}" class="small-section bg-dark-lighter pt-30 pb-30">
                <div class="relative container align-center">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="hs-line-11 font-alt mb-0">{{ $section->name }}</h1>
                        </div>
                    </div>
                </div>
            </section>
            <section class="page-section">
        <div class="container relative">
            @can('isAdmin')
                <div class="border-top mb-10 row align-items-center justify-content-end">
                    <div class="col-auto mt-1 mb-1">
                        <p class="font-alt mb-0"><b>{{ __('sections.name') }}:</b> {{ $section->name }}</p>
                    </div>
                    <div class="col-auto mt-1 mb-1">
                        <p class="font-alt mb-0"><b>{{ __('sections.modify') }}:</b> {{ $section->updated_at }}</p>
                    </div>
                    <div class="col-auto mt-1 mb-1">
                        <p class="font-alt mb-0"><b>{{ __('sections.position') }}:</b> {{ $section->position }}</p>
                    </div>
                    <div class="col-auto mt-1 mb-1">
                        <p class="font-alt mb-0"><b>{{ __('sections.status') }}:</b> {{ $section->status }}</p>
                    </div>
                    <div class="col-auto mt-1 mb-1">
                        @if($section->position!=1)
                            <a href="{{ route('section.up', $section->id) }}"><i class="fa fa-arrow-up"></i></a>
                        @endif

                        @if($section->position!=$sections->count())
                            <a href="{{ route('section.down', $section->id) }}"><i class="fa fa-arrow-down"></i></a>
                        @endif
                    </div>
                    <div class="col-auto mt-1 mb-1">
                        <a href="{{ route('section.edit', $section->id) }}"><i class="fa fa-edit"></i></a>
                        @if($section->status == 'public')
                            <a href="{{ route('section.changeStatus', $section->id) }}"><i class="fa fa-check"></i></a>
                        @else
                            <a href="{{ route('section.changeStatus', $section->id) }}"><i class="fa fa-ban"></i></a>
                        @endif
                    </div>
                    <div class="col-auto mt-1 mb-1">
                        <a href="{{ route('section.confirm', $section->id) }}"><i class="fa fa-trash" style="color: red"></i></a>
                    </div>
                </div>
            @endcan
            {!! $section->content !!}
        </div>
    </section>
        @endif
    @endforeach
    <section id="portfolio" class="small-section bg-dark-lighter pt-30 pb-30">
        <div class="relative container align-center">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="hs-line-11 font-alt mb-0">Portfolio</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section pb-0 pt-0">
        <div class="relative">
            @can('isWriter')
                <div class="row row-cols-auto justify-content-md-center gx-md-2 my-4">
                    <div class="col">
                        <a href="{{ route('post.create') }}" class="btn btn-mod btn-medium btn-round d-none d-sm-inline-block"><i class="fa fa-plus"></i> {{ __('Add new entry') }}</a>
                    </div>
                    <div class="col">
                        @can('isAdmin')
                            <a href="{{ route('category.index') }}" class="btn btn-mod btn-medium btn-round d-none d-sm-inline-block"><i class="fa fa-edit"></i> {{ __('Edit categories') }}</a>
                        @endcan
                    </div>
                </div>
            @endcan
            <!-- Works Filter -->
            <div class="works-filter font-alt align-center mt-40 mb-40" role="tablist">
                <a href="#" class="filter active" role="tab" aria-selected="true" data-filter="*">All works</a>
                @foreach($portfolioCategories as $portfolioCategory)
                    <a href="#{{ str_replace(' ', '-', $portfolioCategory->name) }}" class="filter" role="tab" aria-selected="false" data-filter=".{{ str_replace(' ', '-', $portfolioCategory->name) }}">{{ $portfolioCategory->name }}</a>
                @endforeach
            </div>
            <!-- End Works Filter -->

            <!-- Works Grid -->
            <ul class="works-grid work-grid-3 clearfix font-alt hover-white hide-titles masonry" id="work-grid" style="position: relative; height: 1234.66px;">
                @foreach($posts as $post)--}}
                    @if((($post->status == 'public' && $post->category->status == 'public') || Gate::check('isWriter')) && $post->type == 'portfolio')
                        <!-- Work Item -->
                        <li class="work-item mix {{ str_replace(' ', '-', $post->category->name) }}">
                            <a href="{{ route('post.show', $post->id) }}" class=" mfp-image">
                                <div class="work-img">
                                    <img class="work-img" style="" src="{{ Storage::url($post->image) }}" alt="Work">
                                </div>
                                <div class="work-intro">
                                    <h3 class="work-title">{{ $post->name }}</h3>
                                    <div class="work-descr">
                                        {{ $post->preview }}
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- End Work Item -->
                    @endif
                @endforeach
            </ul>
            <!-- End Works Grid -->

        </div>
    </section>

    <section id="contact" class="small-section bg-dark-lighter pt-30 pb-30">
        <div class="relative container align-center">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="hs-line-11 font-alt mb-0">Kontakt</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section" id="contact">
        <div class="container relative">

            <div class="row mb-60 mb-xs-40">

                <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                    <div class="row">

                        <!-- Phone -->
                        <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
                            <div class="contact-item">
                                <div class="ci-icon">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                                <div class="ci-title font-alt">
                                    Call Us
                                </div>
                                <div class="ci-text">
                                    {{ config('cms.phone') }}
                                </div>
                            </div>
                        </div>
                        <!-- End Phone -->

                        <!-- Address -->
                        <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
                            <div class="contact-item">
                                <div class="ci-icon">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </div>
                                <div class="ci-title font-alt">
                                    Address
                                </div>
                                <div class="ci-text">
                                    {{ config('cms.address1') }}</br>
                                    {{ config('cms.address2') }}
                                </div>
                            </div>
                        </div>
                        <!-- End Address -->

                        <!-- Email -->
                        <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
                            <div class="contact-item">
                                <div class="ci-icon">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
                                <div class="ci-title font-alt">
                                    Email
                                </div>
                                <div class="ci-text">
                                    {{ config('cms.email') }}
                                </div>
                            </div>
                        </div>
                        <!-- End Email -->

                    </div>
                </div>

            </div>

            <!-- Contact Form -->
            @if (session('email_msg'))
                <div class="row justify-content-center">
                    <div class="col-8">
                        <div class="alert alert-primary alert-dismissible" role="alert">
                            <i class="fa fa-comments" aria-hidden="true"></i>
                            {{ session('email_msg') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">


                    <form method="POST" action="{{ route('email') }}" class="form contact-form">
                        @csrf

                        <div class="clearfix">

                            <div class="cf-left-col">

                                <!-- Name -->
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="input-md round form-control @error('name') is-invalid @enderror" placeholder="Name" pattern=".{3,100}" required="" aria-required="true">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="input-md round form-control @error('email') is-invalid @enderror" placeholder="Email" pattern=".{5,100}" required="" aria-required="true">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="cf-right-col">

                                <!-- Message -->
                                <div class="form-group">
                                    <textarea name="message" id="message" class="input-md round form-control @error('message') is-invalid @enderror" style="height: 88px;" placeholder="Message"></textarea>
                                    @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>

                        <div class="clearfix">

                            <div class="cf-left-col">

                                <!-- Inform Tip -->
                                <div class="form-tip pt-20">
                                    <i class="fa fa-info-circle" aria-hidden="true"></i> All the fields are required
                                </div>

                            </div>

                            <div class="cf-right-col">

                                <!-- Send Button -->
                                <div class="align-right pt-10">
                                    <button type="submit" class="submit_btn btn btn-mod btn-medium btn-round" >Submit Message</button>
                                </div>

                            </div>

                        </div>



                        <div id="result" role="region" aria-live="polite" aria-atomic="true"></div>
                    </form>

                </div>
            </div>
            <!-- End Contact Form -->

        </div>
    </section>
@endsection
