<?php

namespace Lana\Peminjaman;

use Illuminate\Support\ServiceProvider;

class LanaPeminjamanServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'LanaPeminjaman');
        require __DIR__.'/routes.php';
    }

    public function register()
    {
        
    }
}
