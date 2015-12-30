<?php

namespace Lana\Home;

use Illuminate\Support\ServiceProvider;

class LanaHomeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        require __DIR__.'/routes.php'; 
        $this->loadViewsFrom(__DIR__.'/resources/views', "LanaHome");
    }
}
