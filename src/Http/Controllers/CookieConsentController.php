<?php

namespace EZ\CookieConsent\Http\Controllers;

use CookieConsent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CookieConsentController extends Controller
{
    public function getConsent(Request $request)
    {
        return CookieConsent::setCookie($request);
    }
}