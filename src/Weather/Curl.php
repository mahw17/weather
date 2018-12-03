<?php

namespace Mahw17\Weather;

/**
 * cUrl methods to fetch information
 */
class Curl
{
    /**
     * Fetch information from single url
     *
     *
     * @param string $url that should be curled.
     *
     * @return string as the response.
     */
    public function fetchSingleUrl($url)
    {
        $chandle = curl_init();

        curl_setopt($chandle, CURLOPT_URL, $url);
        curl_setopt($chandle, CURLOPT_HEADER, 0);
        curl_setopt($chandle, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($chandle);
        curl_close($chandle);

        return $result;
    }

    /**
     * Fetch information from multiple url:s parallell
     *
     *
     * @param array $urlArray array with all urls that should be curled.
     *
     * @return array as the response.
     */
    public function fetchMultiUrl($urlArray)
    {
        // array of curl handles
        $multiCurl = array();

        // data to be returned
        $result = array();

        // multi handle
        $mhandle = curl_multi_init();

        $i = 0; //counter
        foreach ($urlArray as $url) {
            $multiCurl[$i] = curl_init();
            curl_setopt($multiCurl[$i], CURLOPT_URL, $url);
            curl_setopt($multiCurl[$i], CURLOPT_HEADER, 0);
            curl_setopt($multiCurl[$i], CURLOPT_RETURNTRANSFER, 1);
            curl_multi_add_handle($mhandle, $multiCurl[$i]);

            $i++;
        }

        $index = null;

        do {
            curl_multi_exec($mhandle, $index);
        } while ($index > 0);

        // get content and remove handles
        foreach ($multiCurl as $k => $chandle) {
            $result[$k] = json_decode(curl_multi_getcontent($chandle));
            curl_multi_remove_handle($mhandle, $chandle);
        }
        // close
        curl_multi_close($mhandle);

        return $result;
    }
}
