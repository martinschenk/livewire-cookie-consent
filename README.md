# Show a Laravel Livewire Cookie Consent Modal

![Modal cookie consent](docs/img/livewire-cookie-consent-modal1.jpg "Modal 1 for Cookie consent")
![Preferences Modal](docs/img/livewire-cookie-consent-modal2.jpg "Modal 2 preferences for cookie consent")


The package includes a script & styling for a modal cookie banner where the visitor can select his/her cookie preferences.

This package is based on the one from statikbe: https://github.com/statikbe/laravel-cookie-consent and requires https://github.com/wire-elements/modal

With the difference to statikbe that it is using Livewire and another Google Tag Manager Configuration.
There are also still missing ignored_paths and bots checking.
This only works when Google Tag Manager is correctly configured (some regex config based on the value set in the cookie).


## Security

If you discover any security related issues, please email [info@statik.be](mailto:info@statik.be) instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.