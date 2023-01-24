<?php

namespace Martinschenk\LivewireCookieConsent;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Martinschenk\LivewireCookieConsent\Livewire\CookieConsentEdit;
use Martinschenk\LivewireCookieConsent\Livewire\CookieConsentModal;


class CookieConsentModalServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/livewire-cookie-consent.php', 'livewire-cookie-consent');
    }


    public function boot()
    {
        Livewire::component('cookie-consent-modal', CookieConsentModal::class);
        Livewire::component('cookie-consent-edit', CookieConsentEdit::class);

        $this->loadViewsFrom(__DIR__.'/../resources/views',  'livewire-cookie-consent');

        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'livewire-cookie-consent');


        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Console-specific booting.
     *
     *
     *
     * @return void
     */
    protected function bootForConsole()
    {

        //command to publish config file:
        //php artisan vendor:publish --provider="Martinschenk\LivewireCookieConsent\CookieConsentModalServiceProvider" --tag="config"
        $this->publishes([
            __DIR__.'/../config/livewire-cookie-consent.php' => config_path('livewire-cookie-consent.php'),
        ], 'config');

        //This will publish views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/livewire-cookie-consent'),
        ], 'views');
        $this->publishes([
            __DIR__.'/../public' => public_path('/vendor/martinschenk/livewire-cookie-consent'),
        ], 'views');

        //This will publish language files like this -> resources/lang/vendor/cookieConsentModal/en/texts.php
        $langPath = 'vendor/livewire-cookie-consent';
        $langPath = (function_exists('lang_path'))
            ? lang_path($langPath)
            : resource_path('lang/'.$langPath);
        $this->publishes([
            __DIR__.'/../resources/lang' => $langPath,
        ], 'lang');
    }
}
