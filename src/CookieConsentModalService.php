<?php

namespace Martinschenk\LivewireCookieConsent;

use Illuminate\Support\Facades\Cookie;

//martins cookie-consent-modal service
class CookieConsentModalService
{
    protected string $cookieName;
    protected string $cookieValueBoth;
    protected string $cookieValueNone;
    protected int $consentCookieLifetime;
    protected int $refuseCookieLifetime;

    public function __construct()
    {
        $this->cookieName = config('livewire-cookie-consent.cookie_name');
        $this->cookieValueBoth = config('livewire-cookie-consent.cookie_value_both');
        $this->cookieValueNone = config('livewire-cookie-consent.cookie_value_none');
        $this->consentCookieLifetime = config('livewire-cookie-consent.consent_cookie_lifetime');
        $this->refuseCookieLifetime = config('livewire-cookie-consent.refuse_cookie_lifetime');
    }

    public function setConsentCookieValueBoth(): void
    {
        $this->setCookie($this->cookieName, $this->cookieValueBoth, $this->consentCookieLifetime);
    }


    public function setConsentCookieValueNone(): void
    {
        $this->setCookie($this->cookieName, $this->cookieValueNone, $this->refuseCookieLifetime);
    }


    public function setUserSelectedCookieValue($userSelectedCookieValue): bool
    {

        if (!$this->isValidCookieValue($userSelectedCookieValue)) {
            return false;
        }

        $cookieLifetime = $this->findCookieLifetime($userSelectedCookieValue);

        $this->setCookie($this->cookieName, $userSelectedCookieValue, $cookieLifetime);

        return true;
    }


    private function findCookieLifetime($userSelectedCookieValue): int
    {
        $cookieLifetime = $this->consentCookieLifetime;

        if ($userSelectedCookieValue == $this->cookieValueNone) {
            $cookieLifetime = $this->refuseCookieLifetime;
        }

        return $cookieLifetime;
    }


    private function isValidCookieValue($userSelectedCookieValue): bool
    {
        $posibleCookieValues = [
            config('livewire-cookie-consent.cookie_value_both'),
            config('livewire-cookie-consent.cookie_value_none'),
            config('livewire-cookie-consent.cookie_value_analytics'),
            config('livewire-cookie-consent.cookie_value_marketing'),

        ];

        if (in_array($userSelectedCookieValue, $posibleCookieValues)) {
            return true;
        }

        return false;
    }


    public function setCookie($name, $value, $lifetime)
    {
        Cookie::queue($name, $value, $lifetime, null, null, false, false);
    }


    public function consentCookieExists(): bool
    {
        if (Cookie::get(config('livewire-cookie-consent.cookie_name')) !== null){
            return true;
        }
        return false;

    }

    public function getConsentCookieValue(): string
    {
        return $this->getConsentCookie();
    }


    //martin
    private function getConsentCookie()
    {
        return request()->cookie(config('livewire-cookie-consent.cookie_name'));

        //test
        //return request()->cookie('vissittest_session');
        //return request()->cookie('XSRF-TOKEN');
    }




}
