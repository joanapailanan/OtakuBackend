<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use App\Services\AnilistService;
use App\Services\JikanApiService;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(JikanApiService::class, function ($app) {
            return new JikanApiService();
        });
    }

    public function boot()
    {
        // Force HTTPS in production
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
