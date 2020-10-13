<?php

namespace ArtARTs36\Morpher;

use ArtARTs36\Morpher\Exceptions\GivenIncorrectData;
use ArtARTs36\Morpher\Exceptions\MorpherException;
use ArtARTs36\Morpher\Exceptions\UndefinedException;

class Client implements Contracts\Client
{
    protected const BASE_URL = 'https://ws3.morpher.ru';

    protected const ERROR_LIMIT = 1;

    protected const ERRORS = [
        self::ERROR_LIMIT => 'Request limit exceeded',
    ];

    protected $guzzle;

    protected $baseUrl;

    public function __construct(\GuzzleHttp\ClientInterface $guzzle, string $baseUrl = self::BASE_URL)
    {
        $this->guzzle = $guzzle;
        $this->baseUrl = $baseUrl;
    }

    public function get(string $url, array $params = []): array
    {
        return $this->execute(__FUNCTION__, $url, $params);
    }

    protected function execute(string $method, string $url, array $params = []): array
    {
        return $this->validate($this->send($method, $url, $params));
    }

    protected function send(string $method, string $url, array $params = []): string
    {
        return $this->guzzle->request($method, $this->url($url, $params), $this->options())->getBody()->getContents();
    }

    protected function validate(string $response): array
    {
        $decode = json_decode($response, true);

        if (empty($decode)) {
            throw new GivenIncorrectData();
        }

        if (isset($decode['code'])) {
            $this->handleException($decode['code']);
        }

        return $decode;
    }

    protected function handleException($code): void
    {
        if (isset(static::ERRORS[$code])) {
            throw new MorpherException(static::ERRORS[$code]);
        } else {
            throw new UndefinedException();
        }
    }

    protected function options(): array
    {
        return [
            'headers' => [
                'Accept' => 'application/json',
            ],
        ];
    }

    final protected function url(string $url, array $params = []): string
    {
        $url = $this->baseUrl . DIRECTORY_SEPARATOR . $url;

        if ($params) {
            $url .= '?'. http_build_query($params);
        }

        return $url;
    }
}
