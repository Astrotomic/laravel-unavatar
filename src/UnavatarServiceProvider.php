<?php

namespace Astrotomic\LaravelUnavatar;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Factory;

class UnavatarServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('unavatar.php'),
            ], 'config');
        }
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'unavatar');

        $this->app->singleton(Factory::class);
    }
}
