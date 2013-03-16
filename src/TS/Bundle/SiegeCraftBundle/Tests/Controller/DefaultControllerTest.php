<?php

namespace TS\Bundle\SiegeCraftBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $this->markTestIncomplete('At the moment the index page redirects to login if not authenticated.');

        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $response = $client->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }
}
