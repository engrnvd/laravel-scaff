<?php

namespace Naveed\Scaff;

use Illuminate\Support\ServiceProvider;

class ScaffServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->register(ScaffRouteServiceProvider::class);
        $this->loadViewsFrom(__DIR__ . "/views", "naveed.scaff");
    }

    public function register()
    {
    }
}
