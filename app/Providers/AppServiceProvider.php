<?php

namespace App\Providers;

use Blade;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Global Variable in all Blade
        View::composer('*', function ($view) {
            $view->with('userrr', 'amirex');
        });
        // Or can User it
        View::share('userr','mamade');
//        Debugbar::enable();
        Blade::include('Components.errors', 'errors');
        Blade::include('Components.category', 'category');
        Blade::include('Components.input', 'input');
        Blade::include('Components.status', 'status');
        Blade::include('Components.option', 'option');
        Blade::component('Components.select', 'select');
    }
}
