<?php

namespace EZ\CookieConsent\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class CookieConsentRouteServiceProvider extends ServiceProvider
{
    protected $namespace = "EZ\CookieConsent\Http\Controllers";

    public function boot() 
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapWebRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware("web")->namespace($this->namespace)->group(__DIR__."/../Routes/web.php");
    }
}