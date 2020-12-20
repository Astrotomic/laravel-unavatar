<?php

namespace Astrotomic\Unavatar\Laravel;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class UnavatarServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('unavatar.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/unavatar'),
            ], 'views');
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'unavatar');

        Blade::componentNamespace('Astrotomic\Unavatar\Laravel\View\Components', 'unavatar');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'unavatar');
    }
}
