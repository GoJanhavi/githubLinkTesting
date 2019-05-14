<?php

namespace Tests\Unit;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function tesGetRequestTest()
    {
        $client = new Client();

        $response = $client->get('http://34.203.203.222/submit?git=https://github.com/Shriyash26/laravel_hw1');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testGetResponseTest()
    {
        $client = new Client();

        $response = $client->get('http://34.203.203.222/submit?git=https://github.com/Shriyash26/laravel_hw1');
        $this->assertNotEmpty($response->getBody());
    }
}