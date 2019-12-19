<?php

namespace Naveed\Scaff;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class ScaffRouteServiceProvider extends RouteServiceProvider
{
    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        \Route::prefix('naveed/scaff')
            ->middleware('web')
            ->namespace('Naveed\Scaff\Controllers')
            ->group(__DIR__ . '/routes/web.php');
    }
}
