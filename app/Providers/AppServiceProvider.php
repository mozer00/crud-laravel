<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // diz ao Laravel para usar os templates de paginação do Bootstrap 5
        // por padrão o Laravel usaria Tailwind CSS
        Paginator::useBootstrapFive();
    }
}
