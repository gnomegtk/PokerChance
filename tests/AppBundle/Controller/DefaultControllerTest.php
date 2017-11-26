<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    /*
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
    }
    */

    private $card_service;

    public function __construct() {
        parent::__construct();

        //start the symfony kernel
        $kernel = static::createKernel();
        $kernel->boot();

        //get the DI container
        $container = $kernel->getContainer();

        //now we can instantiate our service (if you want a fresh one for
        //each test method, do this in setUp() instead
        $this->card_service = $container->get('card-chance');
    }

    public function testChanceBeforeDraftIndex()
    {
        $this->assertEquals(1 / 52, $this->card_service->getChance());
    }

    public function testChanceAfterDraftIndex()
    {
        $this->card_service->
        $this->assertEquals(1 / 51, $this->card_service->getChance());
    }
}
