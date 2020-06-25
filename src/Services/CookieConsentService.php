<?php

namespace EZ\CookieConsent\Services;

use Illuminate\Support\Facades\View;
use Illuminate\Session\SessionManager;

class CookieConsentService
{
    private $session;
    private $sessionKey;

    public function __construct(SessionManager $session)
    {
        $this->session = $session;
        $this->sessionKey = config("cookieconsent.session_key");
    }

    /**
     * Set cookie consent as 'given'
     * 
     * @return      void
     */
    public function setConsent()
    {
        $this->session->put($this->sessionKey, "set");
        $this->session->save();
    }

    /**
     * Has (given) consent
     * 
     * @return      boolean
     */
    public function hasConsent()
    {
        return !is_null($this->session->get($this->sessionKey));
    }

    /**
     * Clear any consent that has been given
     * 
     * @return      void
     */
    public function clear()
    {
        return $this->session->forget($this->sessionKey);
    }
}