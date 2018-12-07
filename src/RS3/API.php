<?php

declare(strict_types=1);

namespace RuneStat\RS3;

use Exception;
use GuzzleHttp\Exception\RequestException;
use RuneStat\Exceptions\PlayerIsNotAMember;
use RuneStat\Exceptions\PlayerNotFound;
use RuneStat\Exceptions\PlayerProfilePrivate;
use RuneStat\Exceptions\UnknownError;
use RuneStat\HttpClient;

class API
{
    /**
     * @var callable|null
     */
    protected static $clientResolver;

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
        $this->client = self::resolveHttpClient();
    }

    private function resolveHttpClient(): HttpClient
    {
        if (is_callable(self::$clientResolver)) {
            return call_user_func(self::$clientResolver);
        }

        return new HttpClient();
    }

    public static function setHttpClientResolver(callable $resolver): void
    {
        self::$clientResolver = $resolver;
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

        if (array_key_exists('error', $json)) {
            switch (mb_strtoupper($json['error'])) {
                case 'PROFILE_PRIVATE':
                    throw new PlayerProfilePrivate($rsn);
                case 'NOT_A_MEMBER':
                    throw new PlayerIsNotAMember($rsn);
                default:
                    throw new UnknownError($json['error']);
            }
        }

        return Profile::fromProfileJson($json);
    }
}
