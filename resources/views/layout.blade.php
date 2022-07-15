<!DOCTYPE html>
<!-- Change the value of lang="en" attribute if your website's language is not English.
You can find the code of your language here - https://www.w3schools.com/tags/ref_language_codes.asp -->
<html lang="en">
<head>
    <title>{{ config('cms.name') }}</title>
    <meta name="description" content="Projektowanie graficzne">
    <meta charset="utf-8">
    <meta name="author" content="...">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset(config('cms.favicon')) }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vertical-rhythm.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
</head>
<body class="appear-animate">

<!-- Page Loader -->
<div class="page-loader">
    <div class="loader">Loading...</div>
</div>
<!-- End Page Loader -->

<!-- Skip to Content -->
<a href="#main" class="btn skip-to-content">Skip to Content</a>
<!-- End Skip to Content -->

<!-- Page Wrap -->
<div class="page" id="top">

    <!-- Navigation panel -->
    <nav class="main-nav transparent stick-fixed">
        <div class="full-wrapper relative clearfix">
            <!-- Logo ( * your text or image into link tag *) -->
            <div class="nav-logo-wrap local-scroll">
                <a href="{{ route('home') }}" class="logo">
                    <img style="max-width: 200px; max-height: 20px; width: auto; height: auto" src="{{ asset(config('cms.logo')) }}" alt="{{ config('cms.short_name') }}" />
                </a>
            </div>
            <div class="mobile-nav" role="button" tabindex="0">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Menu</span>
            </div>
            <!-- Main Menu -->
            <div class="inner-nav desktop-nav">
                <ul class="clearlist scroll-nav local-scroll">
                    <li class="active"><a href="{{ route('home') }}">Home</a></li>
                    @foreach($sections as $section)
                        @if($section->status=='public')
                        <li><a href="{{ route('home') }}#{{ str_replace(' ', '-', $section->name) }}">{{$section->name}}</li></a>
                        @endif
                    @endforeach
                    <li>
                        <a href="{{ route('post.indexAll') }}" class="mn-has-sub active">Blog
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="mn-sub">
                            @foreach($blogCategories as $blogCategory)
                                @if($blogCategory->status == 'public' || Auth::check())
                                    <li class="mn-sub">
                                        <a href="{{ route('post.index', $blogCategory->id) }}">{{ $blogCategory->name }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{ route('home') }}#portfolio">Portfolio</a></li>
                    <li><a href="{{ route('home') }}#contact">Kontakt</a></li>

                    @guest
                        {{--                        @if (Route::has('login'))--}}
                        {{--                            <li>--}}
                        {{--                                <a href="{{ route('login') }}">{{ __('Login') }}</a>--}}
                        {{--                            </li>--}}
                        {{--                        @endif--}}

                        @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li>
                            <a href="#" class="mn-has-sub">
                                {{ Auth::user()->name }}
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="mn-sub">
                                <li class="mn-sub">
                                    <a href="{{ route('user.passwordReset') }}">
                                        {{ __('Change password') }}
                                    </a>
                                </li>
                                @can('isAdmin')
                                <li class="mn-sub">
                                    <a href="{{ route('user.index') }}">
                                        {{ __('User management') }}
                                    </a>
                                </li>
                                    <li class="mn-sub">
                                        <a href="{{ route('category.index') }}">
                                            {{ __('Category management') }}
                                        </a>
                                    </li>
                                @endcan
                                <li class="mn-sub">
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>
                            </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navigation panel -->

    <main id="main">

        <!-- Content -->

            @yield('content')

        <!-- End Content -->
    </main>
    <!-- Foter -->
    <footer class="page-section bg-gray-lighter footer pb-60">
        <div class="container">

            <!-- Footer Logo -->
            <div class="local-scroll mb-30 wow fadeInUp" data-wow-duration="1.2s">
                <a href="{{ route('home') }}"><img src="{{ asset(config('cms.logo')) }}" width="179" height="29" alt="{{ config('cms.name') }}" /><span class="sr-only">Scroll to the top of the page</span></a>
            </div>
            <!-- End Footer Logo -->

            <!-- Social Links -->
            <div class="footer-social-links mb-110 mb-xs-60">
                <a href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i> <span class="sr-only">Facebook profile</span></a>
                <a href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i> <span class="sr-only">Twitter profile</span></a>
                <a href="#" title="Behance" target="_blank"><i class="fa fa-behance"></i> <span class="sr-only">Behance profile</span></a>
                <a href="#" title="LinkedIn+" target="_blank"><i class="fa fa-linkedin"></i> <span class="sr-only">LinkedIn+ profile</span></a>
                <a href="#" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i> <span class="sr-only">Pinterest profile</span></a>
            </div>
            <!-- End Social Links -->

            <!-- Footer Text -->
            <div class="footer-text">

                <!-- Copyright -->
                <div class="footer-copy font-alt local-scroll">
                    <a href="{{ route('home') }}">© {{ config('cms.short_name') }} 2022</a>.
                </div>
                <!-- End Copyright -->

                <div class="footer-made">
                    {{ config('cms.description') }}
                </div>

            </div>
            <!-- End Footer Text -->

        </div>


        <!-- Top Link -->
        <div class="local-scroll">
            <a href="#top" class="link-to-top"><i class="fa fa-caret-up"></i></a>
        </div>
        <!-- End Top Link -->

    </footer>
    <!-- End Foter -->

</div>
<!-- End Page Wrap -->


<!-- JS -->
<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/SmoothScroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.localScroll.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.viewport.mini.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.countTo.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.appear.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.sticky.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.parallax-1.1.3.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.fitvids.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/morphext.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.lazyload.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/all.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/contact-form.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
<!--[if lt IE 10]><script type="text/javascript" src="{{ asset('js/placeholder.js') }}"></script><![endif]-->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
<script type="text/javascript">
    CKEDITOR.replace('content', {
        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>

</body>
</html>
