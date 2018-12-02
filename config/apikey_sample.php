<?php
/**
 * Storage for API keys.
 *
 */

return [
    // API KEY for https://ipstack.com/documentation
    'ipstack' => [
        "apiKey"        => "novalid26f994350ae2943e96aa8a",
        "apiUrl"        => "http://api.ipstack.com/",
        "apiExample"    => "http://api.ipstack.com/134.201.250.155?access_key=novalid26f994350ae2943e96aa8a"
    ],
    // API KEY for https://darksky.net/dev
    'darksky' => [
        "apiKey"        => "novalid26f994350ae2943e96aa8a",
        "apiUrl"        => "https://api.darksky.net/forecast/",
        "apiExtension"  => "?lang=sv&units=si&exclude=minutely,hourly,alerts,flags",
        "apiExample"    => "https://api.darksky.net/forecast/novalid26f994350ae2943e96aa8a/37.8267,-122.4233"
    ]
];
