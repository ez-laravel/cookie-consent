<?php

namespace EZ\CookieConsent\Services;

use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CookieConsentService
{
    private $cookieName;

    public function __construct()
    {
        $this->cookieName = config("cookieconsent.cookie_name");
    }

    /**
     * Set cookie
     * 
     * @param       Request         The request of the controller method that's calling this method
     * @return      void
     */
    public function setCookie(Request $request)
    {
        // 20 days
        $aliveFor = 60 * 60 * 24 * 20;
        
        // Set cookie on next request
        Cookie::queue($this->cookieName, "consent", $aliveFor);
    }

    /**
     * Cookie has been set
     * 
     * @return      boolean
     */
    public function cookieHasBeenSet()
    {
        return !is_null(Cookie::get($this->cookieName)) ? true : false;
    }
}