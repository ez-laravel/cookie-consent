<?php

namespace EZ\CookieConsent\Providers;

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
        // Register the cookie consent service
        $this->app->singleton("cookie-consent", function($app) {
            return new CookieConsentService($app["session"]);
        });

        // Setup loading of the config file
        $this->mergeConfigFrom(__DIR__."/../config/cookieconsent.php", "cookieconsent");

        // Setup loading of the views
        $this->loadViewsFrom(__DIR__."/../resources/views", "cookieconsent");
    }
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Setup publishing of the config file
        $this->publishes([
            __DIR__."/../config/cookieconsent.php" => config_path("cookieconsent.php"),
        ], "config");

        // Setup publishing of the views
        $this->publishes([
            __DIR__."/../resources/views" => base_path("resources/views/vendor/cookieconsent")
        ], "views");

        // Compose the cookie consent dialog view
        View::composer("cookie-consent::dialog", function($view) {
            $view->with("consentCookieSet", app("cookieconsent")->cookieHasBeenSet());
        });
    }
}