<div class="m-8 text-sm leading-normal text-gray-600">

    <div class="mb-6">
        <img src="{{ asset('/vendor/martinschenk/livewire-cookie-consent/LaravelLogo.svg') }}">
    </div>

    <div class="mb-6">
        @lang('livewire-cookie-consent::texts.alert_text')

    </div>

    {{--    gtm-cookie-button is trigger in gtm --}}
    <button
        class="gtm-cookie-button acceptAllCookies mb-4 w-full items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
        wire:click="acceptAllCookies"
        wire:loading.attr="disabled">
        @lang('livewire-cookie-consent::texts.alert_accept')
    </button>

    {{--    gtm-cookie-button is trigger in gtm --}}
    <button class="gtm-cookie-button gtm-cookie-button mb-4 w-full items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
            wire:click="acceptEssentialCookies"
            wire:loading.attr="disabled">
        @lang('livewire-cookie-consent::texts.alert_essential_only')
    </button>

    <button
        class=" mb-6 w-full inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition cursor-pointer"
        wire:click="$emit('openModal', 'cookie-consent-edit')"
        wire:loading.attr="disabled">
        @lang('livewire-cookie-consent::texts.alert_settings')
    </button>

</div>
