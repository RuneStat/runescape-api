<?php

namespace Tests\RS3\API;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use RuneStat\RS3\API\Client;

class ClientTest extends TestCase
{
    /**
     * @var Client
     */
    protected $client;

    public function setUp()
    {
        parent::setUp();

        $this->client = new Client();
    }

    public function tearDown()
    {
        $this->client = null;

        parent::tearDown();
    }

    /** @test */
    public function it_should_create_a_psr7_request()
    {
        $this->assertInstanceOf(RequestInterface::class, $this->client->request('GET', '/'));
    }

    /** @test */
    public function it_should_set_the_user_agent_header()
    {
        $request = $this->client->request('GET', '/');

        $this->assertSame(['RuneStat API Client'], $request->getHeader('User-Agent'));
    }
}
