# Show a Laravel Livewire Cookie Consent Modal

![Modal cookie consent](docs/img/livewire-cookie-consent-modal1.jpg "Modal 1 for Cookie consent")
![Preferences Modal](docs/img/livewire-cookie-consent-modal2.jpg "Modal 2 preferences for cookie consent")


The package includes a script & styling for a modal cookie banner where the visitor can select his/her cookie preferences.

This package is based on the one from statikbe: https://github.com/statikbe/laravel-cookie-consent and requires https://github.com/wire-elements/modal

With the difference to statikbe that it is using Livewire and another Google Tag Manager Configuration.
There are also still missing ignored_paths and bots checking.
This package only works when Google Tag Manager is correctly configured.


* [Installation](#installation)

[//]: # (* [Usage]&#40;#usage&#41;)

[//]: # (* [Customising the dialog texts]&#40;#customising-the-dialog-texts&#41;)

[//]: # (    + [Customising the dialog contents]&#40;#customising-the-dialog-contents&#41;)

[//]: # (    + [Publishing]&#40;#publishing&#41;)

[//]: # (        - [Config]&#40;#config&#41;)

[//]: # (        - [Translations]&#40;#translations&#41;)

[//]: # (        - [Views]&#40;#views&#41;)

[//]: # (* [Configure Google Tag Manager]&#40;#configure-google-tag-manager&#41;)

[//]: # (* [Security]&#40;#security&#41;)

[//]: # (* [License]&#40;#license&#41;)


## Installation

You can install the package via composer:

``` bash
composer require martinschenk/livewire-cookie-consent
```

[//]: # (The package will automatically register itself.)

[//]: # ()
[//]: # (First of all **you need to** publish the javascript and css files:)

[//]: # (```bash)

[//]: # (php artisan vendor:publish --provider="Statikbe\CookieConsent\CookieConsentServiceProvider" --tag="public")

[//]: # (```)

[//]: # ()
[//]: # (Include the css/cookie-consent.css into your base.blade.php or any other base template you use.)

[//]: # (```)

[//]: # (<link rel="stylesheet" type="text/css" href="{{asset&#40;"vendor/cookie-consent/css/cookie-consent.css"&#41;}}">)

[//]: # (```)

[//]: # ()
[//]: # (The javascript file is included in the cookie snippet and will be added at the end of your body.)

[//]: # (## Usage)

[//]: # ()
[//]: # (Instead of including a snippet in your view, we will automatically add it. This is done using middleware using two methods:)

[//]: # ()
[//]: # (1. The first option: include it in your entire project using the kernel:)

[//]: # ()
[//]: # (```php)

[//]: # (// app/Http/Kernel.php)

[//]: # ()
[//]: # (class Kernel extends HttpKernel)

[//]: # ({)

[//]: # (    protected $middleware = [)

[//]: # (        // ...)

[//]: # (        \Statikbe\CookieConsent\CookieConsentMiddleware::class,)

[//]: # (    ];)

[//]: # ()
[//]: # (    // ...)

[//]: # (})

[//]: # (```)

[//]: # ()
[//]: # (2. The second option: include it as a route middleware and add this to any route you want.)

[//]: # ()
[//]: # (```php)

[//]: # (// app/Http/Kernel.php)

[//]: # ()
[//]: # (class Kernel extends HttpKernel)

[//]: # ({)

[//]: # (    // ...)

[//]: # (    )
[//]: # (    protected $routeMiddleware = [)

[//]: # (        // ...)

[//]: # (        'cookie-consent' => \Statikbe\CookieConsent\CookieConsentMiddleware::class,)

[//]: # (    ];)

[//]: # (})

[//]: # ()
[//]: # ()
[//]: # (// routes/web.php)

[//]: # (Route::group&#40;[)

[//]: # (    'middleware' => ['cookie-consent'])

[//]: # (], function&#40;&#41;{)

[//]: # (    // ...)

[//]: # (}&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (This will add `cookieConsent::index` to the content of your response right before the closing body tag.)

[//]: # ()
[//]: # (## Customising the dialog texts)

[//]: # ()
[//]: # (If you want to modify the text shown in the dialog you can publish the lang-files with this command:)

[//]: # ()
[//]: # (```bash)

[//]: # (php artisan vendor:publish --provider="Statikbe\CookieConsent\CookieConsentServiceProvider" --tag="lang")

[//]: # (```)

[//]: # ()
[//]: # (This will publish this file to `resources/lang/vendor/cookieConsent/en/texts.php`.)

[//]: # ( ```php)

[//]: # ( )
[//]: # ( return [)

[//]: # (     'alert_title' => 'Deze website gebruikt cookies',)

[//]: # (     'setting_analytics' => 'Analytische cookies',)

[//]: # ( ];)

[//]: # ( ```)

[//]: # ()
[//]: # (If you want to translate the values to, for example, English, just copy that file over to `resources/lang/vendor/cookieConsent/fr/texts.php` and fill in the English translations.)

[//]: # ()
[//]: # (### Customising the dialog contents)

[//]: # ()
[//]: # (If you need full control over the contents of the dialog. You can publish the views of the package:)

[//]: # ()
[//]: # (```bash)

[//]: # (php artisan vendor:publish --provider="Statikbe\CookieConsent\CookieConsentServiceProvider" --tag="views")

[//]: # (```)

[//]: # ()
[//]: # (This will copy the `index`  view file over to `resources/views/vendor/cookieConsent`.)

[//]: # ()
[//]: # (The `cookie-settings` view file is just a snippet you need to place somewhere onto your page. Most preferably in the footer next to the url of your cookie policy.)

[//]: # ()
[//]: # (```html )

[//]: # (<a href="javascript:void&#40;0&#41;" class="js-lcc-settings-toggle">@lang&#40;'cookie-consent::texts.alert_settings'&#41;</a>)

[//]: # (```)

[//]: # ()
[//]: # (This gives your visitor the opportunity to change the settings again.)

[//]: # (### Publishing)

[//]: # (#### Config)

[//]: # ()
[//]: # (```bash)

[//]: # (php artisan vendor:publish --provider="Statikbe\CookieConsent\CookieConsentServiceProvider" --tag="config")

[//]: # (```)

[//]: # (This is the contents of the published config-file:)

[//]: # (This will read the policy urls from your env.)

[//]: # (```php)

[//]: # (return [)

[//]: # (    'cookie_key' => '__cookie_consent',)

[//]: # (    'cookie_value_analytics' => '2',)

[//]: # (    'cookie_value_marketing' => '3',)

[//]: # (    'cookie_value_both' => 'true',)

[//]: # (    'cookie_value_none' => 'false',)

[//]: # (    'cookie_expiration_days' => '365',)

[//]: # (    'gtm_event' => 'pageview',)

[//]: # (    'ignored_paths' => [],)

[//]: # (    'policy_url_en' => env&#40;'COOKIE_POLICY_URL_EN', null&#41;,)

[//]: # (    'policy_url_fr' => env&#40;'COOKIE_POLICY_URL_FR', null&#41;,)

[//]: # (    'policy_url_nl' => env&#40;'COOKIE_POLICY_URL_NL', null&#41;,)

[//]: # (];)

[//]: # (```)

[//]: # (You can customize some settings that work with your GTM.)

[//]: # ()
[//]: # (#### Don't show modal on cookie policy page or other pages)

[//]: # (If you don't want the modal to be shown on certain pages you can add the relative url to the ignored paths setting. This also accepts wildcards &#40;see the Laravel `Str::is&#40;&#41;` [helper]&#40;https://laravel.com/docs/9.x/helpers#method-str-is&#41;&#41;.)

[//]: # (```)

[//]: # ('ignored_paths => ['/en/cookie-policy', '/api/documentation*'];)

[//]: # (```)

[//]: # ()
[//]: # (#### Translations)

[//]: # ()
[//]: # (```bash)

[//]: # (php artisan vendor:publish --provider="Statikbe\CookieConsent\CookieConsentServiceProvider" --tag="lang")

[//]: # (```)

[//]: # ()
[//]: # (#### Views)

[//]: # ()
[//]: # (```bash)

[//]: # (php artisan vendor:publish --provider="Statikbe\CookieConsent\CookieConsentServiceProvider" --tag="views")

[//]: # (```)

[//]: # ()
[//]: # (## Configure Google Tag Manager)

[//]: # (All the steps to configure your Google Tag Manager can be found [here]&#40;docs/google-tag-manager.md&#41;.)

[//]: # ()


## Security

If you discover any security related issues, please email [info@statik.be](mailto:info@statik.be) instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.