<?php

namespace EZ\CookieConsent\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use EZ\CookieConsent\Services\CookieConsentService;

class CookieConsentServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register the route service provider
        $this->app->register(CookieConsentRouteServiceProvider::class);

        // Register the cookie consent service
        $this->app->singleton("cookie-consent", function($app) {
            return new CookieConsentService($app["session"]);
        });

        // Setup loading of the config file
        $this->mergeConfigFrom(__DIR__."/../config/cookieconsent.php", "cookieconsent");
    }
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {        
        // Load package views
        $this->loadViewsFrom(__DIR__."/../resources/views", "cookieconsent");

        // Setup publishing of the config file
        $this->publishes([__DIR__."/../config/cookieconsent.php" => config_path("cookieconsent.php")], "config");

        // Setup publishing of the views & vue components
        $this->publishes([
            __DIR__."/../resources/views" => base_path("resources/views/vendor/cookieconsent"),
            __DIR__."/../resources/js/components" => base_path("resources/js/components"),
        ], "frontend");

        // Compose the cookie consent dialog view
        View::composer("cookieconsent::dialog", function($view) {
            $view->with("hasConsent", app("cookie-consent")->hasConsent());
        });
    }
}