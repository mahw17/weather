<?php
/**
 * Load the ip controller.
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
