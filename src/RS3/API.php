<?php

declare(strict_types=1);

namespace RuneStat\RS3;

use Exception;
use GuzzleHttp\Exception\RequestException;
use RuneStat\Exceptions\PlayerNotFound;
use RuneStat\RS3\Activities\Repository as Activities;
use RuneStat\HttpClient;
use RuneStat\RS3\Stats\Repository as Stats;

class API
{
    /**
     * @var HttpClient
     */
    protected $client;

    /**
     * @var string[]
     */
    private $endpoints = [
        'profile' => 'https://apps.runescape.com/runemetrics/profile/profile?user=%s&activities=20',
    ];

    public function __construct()
    {
        $this->client = new HttpClient();
    }

    /**
     * @param string $endpoint
     * @param mixed  ...$params
     * @return string
     * @throws Exception
     */
    protected function getEndpoint(string $endpoint, ...$params): string
    {
        if (! array_key_exists($endpoint, $this->endpoints)) {
            throw new Exception(
                sprintf('Unknown endpoint [%s] requested', $endpoint)
            );
        }

        return sprintf($this->endpoints[$endpoint], ...$params);
    }

    public function getProfile(string $rsn): Profile
    {
        try {
            $response = $this->client->get(sprintf($this->endpoints['profile'], $rsn));
        } catch (RequestException $e) {
            $response = $e->getResponse();

            if (! is_null($response) && $response->getStatusCode() === 404) {
                throw new PlayerNotFound($rsn);
            }

            throw $e;
        }

        $json = json_decode($response->getBody()->getContents(), true);

        $stats = Stats::fromProfileJson($json['skillvalues']);
        $activities = Activities::fromProfileJson($json['activities']);

        return new Profile($stats, $activities);
    }
}
