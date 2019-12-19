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
        $this->app->singleton("vueAssets", function () {
            return \File::files(__DIR__ . "/views/vue/shared");
        });

        $this->app->singleton("fieldTypes", function () {
            return require(__DIR__ . "/config/field-types.php");
        });
    }
}
