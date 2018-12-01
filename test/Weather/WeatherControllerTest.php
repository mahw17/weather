<?php

namespace Mahw17\Weather;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the WeatherController.
 */
class WeatherControllerTest extends TestCase
{

    // Create the di container.
    protected $di;
    protected $controller;

    /**
     * Setup before each testcase
     */
    public function setUp()
    {
        global $di;

        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $this->di->loadServices(ANAX_INSTALL_PATH . "/test/config/di");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        // Setup the controller
        $this->controller = new WeatherController();
        $this->controller->setDI($this->di);
    }


    /**
     * Test the route "index - get".
     */
    public function testIndexActionGet()
    {
        // Do the test and assert it
        $res = $this->controller->indexActionGet();
        $this->assertContains("Väder | ramverk1", $res->getBody());
    }

    /**
     * Test the route "index - post".
     */
    public function testIndexActionPost()
    {

        // Do the test and assert it
        $array = [
            "post" => [
                "coord" => "50,50",
                "weatherType" => "history"
            ]
        ];
        $this->di->get("request")->setGlobals($array);
        $res = $this->controller->indexActionPost();
        $this->assertContains("Väder | ramverk1", $res->getBody());
    }

    /**
     * Test the route "index - post".
     */
    public function testIndexActionPostForecast()
    {

        // Do the test and assert it
        $array = [
            "post" => [
                "coord" => "50,50",
                "weather" => "forecast"
            ]
        ];
        $this->di->get("request")->setGlobals($array);
        $res = $this->controller->indexActionPost();
        $this->assertContains("Väder | ramverk1", $res->getBody());
    }

    /**
     * Test the route "index - post".
     */
    public function testIndexActionPostNok()
    {

        // Do the test and assert it
        $array = [
            "post" => [
                "ip" => "fake",
                "weatherType" => "forecast"
            ]
        ];
        $this->di->get("request")->setGlobals($array);
        $res = $this->controller->indexActionPost();
        $this->assertInternalType("object", $res);
    }
}
