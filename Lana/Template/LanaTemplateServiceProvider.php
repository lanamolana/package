<?php

namespace Lana\Template;

use Illuminate\Support\ServiceProvider;

class LanaTemplateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'LanaTemplate');
        $this->publishes([__DIR__.'/public'=>public_path("lana-template")], 'public');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
