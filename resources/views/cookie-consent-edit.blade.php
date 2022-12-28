@php
    $locale = $app->getLocale();
@endphp

<div class="m-8 text-sm leading-normal">

    <div wire:click="$emit('closeModal')" class="cursor-pointer flex flex-items justify-end">
        <svg class="fill-current text-black hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="18"
             height="18" viewBox="0 0 18 18">
            <path
                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
    </div>

    <div class="flex items-left mb-5">
        <img src="{{ asset('/vendor/martinschenk/livewire-cookie-consent/public/LaravelLogo.svg') }}">
    </div>


    <div>
        <div class="">
            <div class="">
                <h2 id="" class="mt-5">
                    @lang('livewire-cookie-consent::texts.settings_title')
                </h2>
                <p>
                    {!! trans('livewire-cookie-consent::texts.settings_text', [ 'policyUrl' => config("livewire-cookie-consent.policy_url_$locale")]) !!}
                </p>

                {{--    gtm-cookie-button is trigger in gtm --}}
                <div class="gtm-cookie-button flex flex-items justify-end">
                    <button
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                        wire:click="acceptAllCookies"
                        wire:loading.attr="disabled">
                        @lang('livewire-cookie-consent::texts.settings_accept_all')
                    </button>
                </div>

                <div class="my-6"></div>

                <form wire:submit.prevent="acceptUserSettings">

                    <div>
                        <label>
                            <input class="disabled:bg-slate-400 disabled:hover:bg-slate-400" type="checkbox"
                                   id="lcc-checkbox-essential" disabled="disabled" checked="checked">
                            <span class="font-bold ml-1">@lang('livewire-cookie-consent::texts.setting_essential')</span>
                        </label>
                        <p>
                            @lang('livewire-cookie-consent::texts.setting_essential_text')
                        </p>
                    </div>
                    <div>
                        <label>
                            <input class="disabled:bg-slate-400 disabled:hover:bg-slate-400" type="checkbox"
                                   disabled="disabled" checked="checked">
                            <span class="font-bold ml-1">@lang('livewire-cookie-consent::texts.setting_functional')</span>
                        </label>
                        <p>
                            @lang('livewire-cookie-consent::texts.setting_functional_text')
                        </p>
                    </div>
                    <div>
                        <label>
                            <input wire:model="analyticsCookies"
                                   type="checkbox">
                            <span class="font-bold ml-1">@lang('livewire-cookie-consent::texts.setting_analytics')</span>
                        </label>
                        <p>
                            @lang('livewire-cookie-consent::texts.setting_analytics_text')
                        </p>
                    </div>
                    <div>
                        <label>
                            <input wire:model="marketingCookies"
                                   type="checkbox">
                            <span class="font-bold ml-1">@lang('livewire-cookie-consent::texts.setting_marketing')</span>
                        </label>
                        <p>
                            @lang('livewire-cookie-consent::texts.setting_marketing_text')
                        </p>
                    </div>

                    <div class="flex flex-items justify-end">

                        {{--    gtm-cookie-button is trigger in gtm --}}
                        <button class="gtm-cookie-button inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                                      wire:loading.attr="disabled" >
                            @lang('livewire-cookie-consent::texts.settings_save')
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
