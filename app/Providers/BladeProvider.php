<?php

namespace App\Providers;

use Blade;
use Illuminate\Support\ServiceProvider;

class BladeProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        // include a file blade with a special name for all of blade file
        Blade::include('Components.errors', 'errors');
        Blade::include('Components.category', 'category');
        Blade::include('Components.input', 'input');
        Blade::include('Components.status', 'status');
        Blade::include('Components.option', 'option');
        Blade::component('Components.select', 'select');

    }
}
