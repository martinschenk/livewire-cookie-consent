<?php

namespace Martinschenk\LivewireCookieConsent\Livewire;

use LivewireUI\Modal\ModalComponent;
use Martinschenk\LivewireCookieConsent\CookieConsentModalService;

class CookieConsentEdit extends ModalComponent
{

    public bool $analyticsCookies = false;
    public bool $marketingCookies = false;
    private string $consentCookieValue = '';


    public function mount(CookieConsentModalService $service)
    {
        if ($service->consentCookieExists()){
            $this->consentCookieValue = $service->getConsentCookieValue();

            if ($this->consentCookieValue == config('livewire-cookie-consent.cookie_value_both')){
                $this->analyticsCookies = true;
                $this->marketingCookies = true;
            }

            if ($this->consentCookieValue == config('livewire-cookie-consent.cookie_value_none')){
                $this->analyticsCookies = false;
                $this->marketingCookies = false;
            }

            if ($this->consentCookieValue == config('livewire-cookie-consent.cookie_value_analytics')){
                $this->analyticsCookies = true;
                $this->marketingCookies = false;
            }

            if ($this->consentCookieValue == config('livewire-cookie-consent.cookie_value_marketing')){
                $this->analyticsCookies = false;
                $this->marketingCookies = true;
            }

       }
    }

    public function acceptAllCookies(CookieConsentModalService $service)
    {
        $this->forceClose()->closeModal();

        $service->setConsentCookieValueBoth();

        $this->dispatchBrowserEvent('cookieChanged', ['value' => 'true']);


    }


    //form answer: user has chosen his individual settings
    public function acceptUserSettings(CookieConsentModalService $service)
    {
        if ($this->analyticsCookies && $this->marketingCookies){
            $this->consentCookieValue = config('livewire-cookie-consent.cookie_value_both');
        }

        if (!$this->analyticsCookies && !$this->marketingCookies){
            $this->consentCookieValue = config('livewire-cookie-consent.cookie_value_none');
        }

        if ($this->analyticsCookies && !$this->marketingCookies){
            $this->consentCookieValue = config('livewire-cookie-consent.cookie_value_analytics');
        }

        if (!$this->analyticsCookies && $this->marketingCookies){
            $this->consentCookieValue = config('livewire-cookie-consent.cookie_value_marketing');
        }

        $this->forceClose()->closeModal();

        $service->setUserSelectedCookieValue($this->consentCookieValue);

        $this->dispatchBrowserEvent('cookieChanged', ['value' => $this->consentCookieValue]);

    }


    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }


    public function render()
    {
        return view('livewire-cookie-consent::cookie-consent-edit');
    }
}
