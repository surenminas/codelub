<?php

namespace App\Providers;

use App\View\Composers\PostComposer;
use App\View\Composers\RateComposer;
use App\View\Composers\MostPopularPostComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('admin.includes.sidebar', PostComposer::class);
        View::composer('includes.sidebar', RateComposer::class);
        View::composer('includes.sidebar', MostPopularPostComposer::class);
        View::composer('home', RateComposer::class);



    }
}
