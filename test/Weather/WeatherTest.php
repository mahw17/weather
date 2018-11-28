<?php

namespace Mahw17\Weather;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the User class.
 */
class WeatherTest extends TestCase
{
    // Create the di container.
    protected $di;
    protected $weatherObj;


    /**
     * Prepare before each test.
     */
    protected function setUp()
    {
        global $di;

        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        $this->weatherObj = $this->di->get("weather");

        // Load the configuration files
        // $cfg = $this->di->get("configuration");
        // $config = $cfg->load("apikey.php");
        // $config = $config["config"] ?? null;

        // Create and configure new ip-object
        // $this->weatherObj = new \Mahw17\Weather\Weather($config);
    }

    /**
     * Test the method weatherForecast.
     */
    public function testweatherForecast()
    {
        $res = $this->weatherObj->weatherForecast();
        $this->assertEquals(57, $res->latitude);
    }

    /**
     * Test the method weatherHistory.
     */
    public function testweatherHistory()
    {
        $res = $this->weatherObj->weatherHistory();
        $this->assertEquals(57, $res[0]->latitude);
    }

    /**
     * Test the method testValidateIpNok
     */
    public function testValidateCoord()
    {
        $res = $this->weatherObj->validateCoord('55,15');
        $this->assertEquals(55, $res['lat']);
    }
}
