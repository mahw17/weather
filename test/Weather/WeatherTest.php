<?php

namespace Mahw17\Weather;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test for modelclass Weather.
 */
class WeatherTest extends TestCase
{

    /**
     * Setup before each testcase
     */
    public function setUp()
    {
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $this->di->loadServices(ANAX_INSTALL_PATH . "/test/config/di");

        $this->weatherObj = $this->di->get("weather");
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
