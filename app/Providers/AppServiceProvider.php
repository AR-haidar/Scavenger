<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;

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
        Carbon::setLocale('id');

        // Jangan dihapus ya, ini buat ngrok biar jalan di local
        if($this->app->environment('local') && !str_contains(config('app.url'), '127.0.0.1') && !str_contains(config('app.url'), 'localhost')) {
            URL::forceScheme('https');
        }
    }
}