<?php

namespace EZ\CookieConsent\Facades;

use Illuminate\Support\Facades\Facade;

class CookieConsentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "cookie-consent";
    }
}