<?php

use Illuminate\Support\Facades\Route;

Route::get("consent-to-cookies", "EZ\\CookieConsent\\Http\\Controllers\\CookieConsentController@getConsent")->name("cookie-consent.consent");