<?php

namespace App\Providers;

use App\Services\CategoryService;
use App\Services\SectionService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(CategoryService $categoryService, SectionService $sectionService)
    {
        if (! App::runningInConsole()) {
            View::share([
                'blogCategories' => $categoryService->indexBlog(),
                'portfolioCategories' => $categoryService->indexPortfolio(),
                'sections' => $sectionService->indexSections()
            ]);
        }

    }
}
