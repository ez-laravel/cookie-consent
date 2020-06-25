<?php

use Illuminate\Support\Facades\Route;

Route::get("consent-to-cookies", "CookieConsentController@getConsent")->name("cookie-consent.consent");