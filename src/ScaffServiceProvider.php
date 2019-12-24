<?php

namespace Naveed\Scaff;

use Illuminate\Support\ServiceProvider;

class ScaffServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->register(ScaffRouteServiceProvider::class);

        $this->loadViewsFrom(__DIR__ . "/views", "naveed.scaff");

        $this->publishes([
            __DIR__ . "/templates" => base_path('resources/views/vendor/naveed/scaff'),
            __DIR__ . "/config/config.php" => config_path('naveed-scaff.php'),
        ]);
    }

    public function register()
    {
    }
}
