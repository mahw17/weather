<?php
/**
 * Load the weather controller.
 */
return [
    "routes" => [
        [
            "info" => "Väder.",
            "mount" => "weather",
            "handler" => "\Mahw17\Weather\WeatherController",
        ]
    ]
];
