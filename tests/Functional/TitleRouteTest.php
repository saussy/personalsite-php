<?php

namespace Tests\Functional;

class TitleRouteTest extends BaseTestCase
{
    /**
     * Test that the routes returns a json response
     * @dataProvider getTestRoutes
    */
    public function testGet($route)
    {
        $response = $this->runApp('GET', $route);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson((string)$response->getBody());
    }

    /**
     * Test that the route won't accept a post request
     * @dataProvider getTestRoutes
     */
    public function testPostTitleNotAllowed($route)
    {
        $response = $this->runApp('POST', $route, ['test']);

        $this->assertEquals(405, $response->getStatusCode());
        $this->assertContains('Method not allowed', (string)$response->getBody());
    }

    public function getTestRoutes()
    {
        return [
            ['/titles'],
            ['/titles/1'],
            ['/randomTitle']
        ];
    }
}