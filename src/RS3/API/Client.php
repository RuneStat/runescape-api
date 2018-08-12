<?php

namespace RuneStat\RS3\API;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;

class Client
{
    /**
     * @var Guzzle
     */
    protected $guzzle;

    public function __construct()
    {
        $this->guzzle = new Guzzle();
    }

    /**
     * @param string              $method
     * @param string|UriInterface $uri
     * @param array               $headers
     * @param null                $body
     * @return RequestInterface
     */
    public function request(string $method, $uri, array $headers = [], $body = null): RequestInterface
    {
        return (new Request($method, $uri, $headers, $body))
            ->withHeader('User-Agent', 'RuneStat API Client');
    }

    /**
     * @param string|UriInterface $uri
     * @param array               $headers
     * @return ResponseInterface
     */
    public function get($uri, array $headers = []): ResponseInterface
    {
        return $this->send($this->request('GET', $uri, $headers));
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function send(RequestInterface $request): ResponseInterface
    {
        return $this->guzzle->send($request, []);
    }
}
