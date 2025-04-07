<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Avatar;
use App\Observers\AvatarObserver;

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
        Avatar::observe(\App\Observers\AvatarObserver::class);
    }
}
