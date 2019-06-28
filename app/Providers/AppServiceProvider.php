<?php

namespace App\Providers;
use View;
use App\Category ;
use App\Brand;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view::share('categories', Category::where('publication_status', 1)->get());
        view::share('brands', Brand::where('publication_status', 1)->get());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
