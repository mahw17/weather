<?php

namespace Mahw17\Weather;

/**
 * Weather class, get weather info based on coordinates
 */
class Weather
{

    /**
     * API KEY.
     */
    private $apiKey = null;

    /**
     * API URL.
     */
    private $apiUrl = null;

    /**
     * API EXTENSION.
     */
    private $apiExtension = null;

    /**
     * API EXTENSION.
     */
    public $ipObj = null;

    /**
     * Constructor fetching api key and api url from specific supplier.
     *
     * @param array $config containing details for connecting to the supplier API.
     */
    public function __construct($config)
    {
        $this->apiKey       = $config['darksky']['apiKey'];
        $this->apiUrl       = $config['darksky']['apiUrl'];
        $this->apiExtension = $config['darksky']['apiExtension'];
    }

    /**
     * Inject Ip-object into weather.
     *
     * @param object $ipObj
     */
    public function setIp($ipObj)
    {
        $this->ipObj = $ipObj;
    }

    /**
     * Fetch weather forecast
     *
     * @param array $ccoordinates contains geolocation lat and long
     *
     * @return string
     */
    public function weatherForecast($coordinates = ["lat" => 57, "lon" => 18])
    {
        // Default value on return attributes
        $url    = $this->apiUrl . $this->apiKey . '/' . $coordinates["lat"] . "," . $coordinates["lon"] . $this->apiExtension;


        // Initiate new curl object
        $curl = new \Mahw17\Weather\Curl();

        // Get response
        $content = $curl->fetchSingleUrl($url);
        $result = json_decode($content);

        // Collect and return results
        return $result;
    }

    /**
     * Fetch weather forecast
     *
     * @param int $day Current day in unix timestamp
     * @param array $coordinates geo coordinates
     *
     * @return array
     */
    public function weatherHistory($day = 1542818124, $coordinates = ["lat" => 57, "lon" => 18])
    {
        // Create $urlArray
        $urlArray = array();
        for ($i=0; $i < 30; $i++) {
            // Day to collect weather data for
            $day = $day - 24 * 60 * 60;

            // API url
            $urlArray[$i] = $this->apiUrl . $this->apiKey . '/' . $coordinates["lat"] . "," . $coordinates["lon"] . "," . $day . $this->apiExtension;
        }

        // Initiate new curl object
        $curl = new \Mahw17\Weather\Curl();

        // Get response
        $result = $curl->fetchMultiUrl($urlArray);
        // $result = json_decode($result);

        // Collect and return results
        return $result;
    }

    /**
     * Validate coordinates
     *
     * @param string $coordinates
     *
     * @return array|boolean with coordinates, false if not valid
     */
    public function validateCoord($coordinates)
    {
        // Convert string to array
        $coord = explode(",", $coordinates);

        // Validate coord
        $coordValid = false;
        if (isset($coord[0]) && isset($coord[1])) {
            $coordinates = [
                "lat" => $coord[0],
                "lon" => $coord[1]
            ];
            $coordValid =  $coordinates["lat"] >= -90 &&
                            $coordinates["lat"] <= 90 &&
                            $coordinates["lon"] >= -180 &&
                            $coordinates["lon"] <= 180
                            ? true : false;
        }

        return $coordValid ? $coordinates : false;
    }
}
