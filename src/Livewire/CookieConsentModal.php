<?php

namespace Martinschenk\LivewireCookieConsent\Livewire;

use LivewireUI\Modal\ModalComponent;
use Martinschenk\LivewireCookieConsent\CookieConsentModalService;

class CookieConsentModal extends ModalComponent
{

    public function acceptAllCookies(CookieConsentModalService $service)
    {
        $this->closeModal();

        $service->setConsentCookieValueBoth();

        $this->dispatchBrowserEvent('cookieChanged', ['value' => 'true']);

    }


    public function acceptEssentialCookies(CookieConsentModalService $service)
    {
        $this->closeModal();

        $service->setConsentCookieValueNone();

        $this->dispatchBrowserEvent('cookieChanged', ['value' => 'false']);

    }


    public function editCookies(){

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
        return view('livewire-cookie-consent::cookie-consent-modal');
    }
}
