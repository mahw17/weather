<?php

namespace Mahw17\Weather;

/**
 * Ip class, validates and get info about a specific IP
 */
class Ip
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
     * Constructor fetching api key and api url from specific supplier.
     *
     * @param array $config containing details for connecting to the supplier API.
     */
    public function __construct($config)
    {
        $this->apiKey = $config['ipstack']['apiKey'];
        $this->apiUrl = $config['ipstack']['apiUrl'];
    }

    /**
     * Validate ip address
     *
     * @param int $ipAddress ip address to validte.
     *
     * @return $this
     */
    public function validateIp($ipAddress)
    {
        // Default value on return attributes
        $valid      = false;
        $ipType    = false;
        $hostname   = false;

        // Check if IP is valid either as a IPV4 or an IPV6
        if (filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $valid      = true;
            $ipType    = 'IPV4';
        } elseif (filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $valid      = true;
            $ipType    = 'IPV6';
        }

        // If IP valid get connected domain, if not null
        if ($valid) {
            $hostname = $ipAddress !== gethostbyaddr($ipAddress) ? gethostbyaddr($ipAddress) : null;
        }

        // Collect and return results
        $result = [
            "ipAddress" => $ipAddress,
            "valid"     => $valid,
            "ipType"    => $ipType,
            "hostname"  => $hostname
        ];
        return $result;
    }

    /**
     * Validate ip:s coordinates
     *
     * @param int $ipAddress ip address to validte.
     *
     * @return mixed array if valid or boolean if false
     */
    public function validateCoord($ipAddress)
    {
        // Validate ip
        $ipValid = $this->validateIp($ipAddress)['valid'];

        // If valid Ip fetch and verify coordinates
        if ($ipValid) {
            $ipInfo = $this->ipInfo($ipAddress);

            if (isset($ipInfo->latitude) && isset($ipInfo->longitude)) {
                $coordinates = [
                    "lat" => $ipInfo->latitude,
                    "lon" => $ipInfo->longitude
                ];
            } else {
                return false;
            }
        } else {
            return false;
        }
        return $coordinates;
    }



    /**
     * Fetch ip information
     *
     * @param string $ipAddress
     *
     * @return array
     */
    public function ipInfo($ipAddress)
    {
        // Default value on return attributes
        $url    = $this->apiUrl . $ipAddress . '?access_key=' . $this->apiKey;

        // Initiate new curl object
        $curl = new \Mahw17\Weather\Curl();

        // Get response
        $result = $curl->fetchSingleUrl($url);
        $result = json_decode($result);

        // Collect and return results
        return $result;
    }

    /**
     * Get user ip-adress.
     *
     * @return string ip-address
     */
    public function getIpAddress()
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
        // foreach (array('REMOTE_ADDR', 'HTTP_X_FORWARDED_FOR', 'HTTP_CLIENT_IP', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                    return $_SERVER[$key];
            }
        }
    }
}
