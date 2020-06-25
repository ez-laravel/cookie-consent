<?php

namespace EZ\CookieConsent\Http\Controllers;

use CookieConsent;
use App\Http\Controllers\Controller;

class CookieConsentController extends Controller
{
    public function getConsent()
    {
        CookieConsent::setConsent();

        return response(200);
    }
}