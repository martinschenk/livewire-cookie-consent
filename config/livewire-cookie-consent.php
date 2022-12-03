<?php
return [

    'cookie_name' => 'cookie-consent',

    'cookie_value_analytics' => '2',
    'cookie_value_marketing' => '3',
    'cookie_value_both' => 'true',
    'cookie_value_none' => 'false',

    'consent_cookie_lifetime' => 60 * 24 * 365,
    'refuse_cookie_lifetime' => 60 * 24 * 30,

    'ignored_paths' => [],

    'policy_url_en' => env('COOKIE_POLICY_URL_EN', '/politica-cookies'),
    'policy_url_de' => env('COOKIE_POLICY_URL_DE', '/cookie-richtlinie'),
    'policy_url_es' => env('COOKIE_POLICY_URL_ES', '/politica-cookies'),




];
