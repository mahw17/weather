<?php
/**
 * Creating the session as a $di service.
 */
return [
    // Services to add to the container.
    "services" => [
        "weather" => [
            "shared" => true,
            "callback" => function () {

                // Load the configuration files
                $cfg = $this->get("configuration");
                $config = $cfg->load("apikey_sample.php");
                $config = $config["config"] ?? null;

                // Create and configure new weather-object
                $weather = new \Mahw17\Weather\Weather($config);

                // Create and configure new ip-object and add to weather service
                $weather->setIp(new \Mahw17\Weather\Ip($config));

                return $weather;
            }
        ],
    ],
];
