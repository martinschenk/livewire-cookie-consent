@if (Cookie::get(config('cookie-consent-modal.cookie_name')) !== null)
    {{--    <p>cookie is set</p>--}}
@else
    {{--    <p>cookie is not set</p>--}}
    {{--    <livewire:cookie-consent-modal />--}}
    {{--modal sale si no se encuentra el cookie --}}

    <script>
        window.addEventListener('load',
            function (event) {
                Livewire.emit("openModal", "cookie-consent-modal")
            })
    </script>

@endif

<script>

    window.addEventListener('cookieChanged', event => {
        //alert('in addEventListener cookieChanged -> value: ' + event.detail.value);
        if (window.dataLayer) {
            //alert('vor dataLayer.push -> value: ' + event.detail.value);
            window.dataLayer.push({event: event.detail.value});
        }
    })
</script>

