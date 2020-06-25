<?php

use Illuminate\Support\Facades\Route;

Route::group(["namespace" => "EZ\\CookieConsent\\Http\\Controllers"], function() {
    Route::get("consent-to-cookies", "CookieConsentController@getConsent")->name("cookie-consent.consent");
});