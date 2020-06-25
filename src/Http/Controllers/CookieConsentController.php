<?php

namespace EZ\CookieConsent\Http\Controllers;

use CookieConsent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CookieConsentController extends Controller
{
    public function getConsent(Request $request)
    {
        // Set the consent cookie
        CookieConsent::setCookie($request);

        // Return 200 status code
        return response(200);
    }
}