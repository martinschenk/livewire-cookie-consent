# Show a Laravel Livewire Cookie Consent Modal

![Modal cookie consent](docs/img/livewire-cookie-consent-modal1.jpg "Modal 1 for Cookie consent")
![Preferences Modal](docs/img/livewire-cookie-consent-modal2.jpg "Modal 2 preferences for cookie consent")


Livewire Cookie Consent is a Livewire component that provides Opt-In Cookie Modals. The user can choose between 
- Essential and functional cookies
- Analytical cookies
- Marketing cookies

Special:
- No Analytical or Marketing cookies are set before the Opt-In decision of the user (European laws).
- User can open the modal with link in page-footer to reconfigure his cookie consent selections.
- You can connect this component to Google Tag Manager if you want to. GTM example Script is included.

## Requirements

Laravel Jetstream with Livewire

Jetstream should only be installed into new Laravel applications. Attempting to install Jetstream into an existing Laravel application will result in unexpected behavior and issues

## Installation

If you haven't installed Jetstream and Livewire

``` bash
composer require laravel/jetstream

php artisan jetstream:install livewire
```
And now install the package

``` bash
composer require martinschenk/livewire-cookie-consent
```
Register the package in /config/app.php

```php
return [
    /*
     * Application Service Providers...
     */
    
    App\Providers\AppServiceProvider::class,
    ...
    Martinschenk\LivewireCookieConsent\CookieConsentModalServiceProvider::class,
    
];
```

## Finalizing The Installation
After installing Jetstream, you should install and build your NPM dependencies and migrate your database:

``` bash
npm install
npm run build
php artisan migrate
```


## Include Livewire directives
Include this into your welcome.blade.php, landing page or any other base template you use.
```html
<html>
<head>
    ...
    @livewireStyles
</head>
<body>
    ...
    @livewireScripts
    @livewire('livewire-ui-modal')
    @include('livewire-cookie-consent::cookieconsent')
</body>
</html>
```

## Include link 
Normaly in the footer of your web-page, include this link. It will open the cookie modal to change preferences. 
```html
<a class='underline' href="#" 
   onclick="Livewire.emit('openModal', 'cookie-consent-edit')">
        {{ __('Cookie Config') }}
</a>
```

## Publishing
### Customising the dialog texts and languages

If you want to modify the text shown in the dialog you can publish the lang-files with this command:

```bash
php artisan vendor:publish --provider="Martinschenk\LivewireCookieConsent\CookieConsentModalServiceProvider" --tag="lang"
```
This will publish the f.e. english language file to lang/vendor/livewire-cookie-consent/en/texts.php . 
```php

return [
    'alert_accept' => 'Accept all cookies',
    'alert_essentials_only' => 'Accept only necessary cookies',
    'alert_settings' => 'Adjust your preferences',
    ...
];


```

### Config
Be careful changing the config values, because the Google Tag Manager is using them. Only change them if you know what you do.
```bash
php artisan vendor:publish --provider="Martinschenk\LivewireCookieConsent\CookieConsentModalServiceProvider" --tag="config"
```

This is the content of the published config-file. You'll find it in /config/livewire-cookie-consent.php


```php

return 

    'cookie_name' => 'cookie-consent',

    'cookie_value_analytics' => '2',
    'cookie_value_marketing' => '3',
    'cookie_value_both' => 'true',
    'cookie_value_none' => 'false',

    'consent_cookie_lifetime' => 60 * 24 * 365,
    'refuse_cookie_lifetime' => 60 * 24 * 30,

];


```

### Views
If you publish the views, you can edit them. The design is done with Tailwind.
You will find the views in resources/views/vendor/livewire-cookie-consent
```bash
php artisan vendor:publish --provider="Martinschenk\LivewireCookieConsent\CookieConsentModalServiceProvider" --tag="views"
```

## Google Tag Manager Configuration
If you want to use Google Tag Manager, you will find an example script for configuration of GTM here: xxxxxxx 

You have to insert the Google Tag Manager Code in the HEAD section this way:

```html
    @livewireStyles
    HERE THE GOOGLE TAG MANAGER CODE
    @vite(['resources/css/app.css', 'resources/js/app.js'])
```

Example:

```html
<head>
    
    ...
    @livewireStyles

    <!-- Google Tag Manager -->
    <script>
        window.dataLayer = window.dataLayer || [];
    </script>
    
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-YOURKEY');</script>
    <!-- End Google Tag Manager -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
```


## Security

If you discover any security related issues, please email [mschenk.pda@gmail.com](mailto:mschenk.pda@gmail.com) instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
