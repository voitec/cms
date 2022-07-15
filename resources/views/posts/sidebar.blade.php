<div class="col-sm-4 col-md-3 offset-md-1 sidebar">

    <!-- Widget -->
    <div class="widget">

        <h5 class="widget-title font-alt">{{ __('Categories') }}</h5>

        <div class="widget-body">
            <ul class="clearlist widget-menu">
                <li>
                    <a href="{{ route('post.indexAll') }}" title="">{{ __('All') }}</a>
                </li>
                @foreach($blogCategories as $blogCategory)
                    @if($blogCategory->status == 'public' || Auth::check())
                    <li>
                        <a href="{{ route('post.index', $blogCategory->id) }}" title="">{{ $blogCategory->name }}</a>
                        <small>
                            - {{$blogCategory->postCountPublic}}@auth / {{$blogCategory->postCountAll}}@endauth
                        </small>
                    </li>
                    @endif
                @endforeach
            </ul>
        </div>

    </div>
    <!-- End Widget -->

</div>
