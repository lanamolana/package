<?php

namespace Lana\User;

use Illuminate\Support\ServiceProvider;

class LanaUserServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'LanaUser');
        require __DIR__.'/routes.php';
    }

    public function register()
    {
        
    }
}
