<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SweetAlertServiceProvider extends ServiceProvider
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
        // Share SweetAlert messages with all views
        View::composer('*', function ($view) {
            $view->with('sweetalert', session()->only(['success', 'error', 'warning', 'info', 'delete', 'errors']));
        });
    }
}
