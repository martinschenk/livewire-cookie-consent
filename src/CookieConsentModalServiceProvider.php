<?php

namespace Martinschenk\CookieConsentModal;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Martinschenk\CookieConsentModal\Livewire\CookieConsentEdit;
use Martinschenk\CookieConsentModal\Livewire\CookieConsentModal;


class CookieConsentModalServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/cookie-consent-modal.php', 'cookie-consent-modal');
    }


    public function boot()
    {
        Livewire::component('cookie-consent-modal', CookieConsentModal::class);
        Livewire::component('cookie-consent-edit', CookieConsentEdit::class);


        $this->loadViewsFrom(__DIR__.'/../resources/views',  'cookie-consent-modal');

        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'cookie-consent-modal');

        //$this->loadViewsFrom(__DIR__.'/../resources/views/livewire/', 'cookie-consent-modal');

        //$this->app['view']->composer('cookie-consent-modal::index', function (View $view) {
        //});

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
        //php artisan vendor:publish --provider="Martinschenk\CookieConsentModal\CookieConsentModalServiceProvider" --tag="config"
        $this->publishes([
            __DIR__.'/../config/cookie-consent-modal.php' => config_path('cookie-consent-modal.php'),
        ], 'config');


        //$this->publishes([
        //    __DIR__.'/../public/' => public_path('vendor/cookie-consent-modal'),
        //], 'public');

        //This will publish livewire views
        $this->publishes([
            __DIR__.'/../resources/views/livewire/cookie-consent-modal' => resource_path('views/vendor/cookie-consent-modal/livewire'),
        ], 'views');

        //This will publish view
        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/cookie-consent-modal'),
        ]);

        //This will publish language files like this -> resources/lang/vendor/cookieConsentModal/en/texts.php
        $langPath = 'vendor/cookie-consent-modal';
        $langPath = (function_exists('lang_path'))
            ? lang_path($langPath)
            : resource_path('lang/'.$langPath);
        $this->publishes([
            __DIR__.'/../resources/lang' => $langPath,
        ], 'lang');
    }
}
