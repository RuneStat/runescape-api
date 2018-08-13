<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use RuneStat\Client;

class ClientTest extends TestCase
{
    /**
     * @var Client
     */
    protected $client;

    public function setUp(): void
    {
        parent::setUp();

        $this->client = new Client();
    }

    public function tearDown(): void
    {
        $this->client = null;

        parent::tearDown();
    }

    /** @test */
    public function it_should_create_a_psr7_request(): void
    {
        $this->assertInstanceOf(RequestInterface::class, $this->client->request('GET', '/'));
    }

    /** @test */
    public function it_should_set_the_user_agent_header(): void
    {
        $request = $this->client->request('GET', '/');

        $this->assertSame(['RuneStat API Client'], $request->getHeader('User-Agent'));
    }
}
