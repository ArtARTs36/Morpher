<?php

namespace ArtARTs36\Morpher;

use ArtARTs36\Morpher\Contracts\Client as MainContract;

class Client implements MainContract
{
    protected const BASE_URL = 'https://ws3.morpher.ru';

    protected $guzzle;

    protected $baseUrl;

    public function __construct(\GuzzleHttp\Client $guzzle, string $baseUrl = self::BASE_URL)
    {
        $this->guzzle = $guzzle;
        $this->baseUrl = $baseUrl;
    }

    public function get(string $url, array $params = []): array
    {
        $response = $this->guzzle->get($this->url($url, $params), $this->options())->getBody()->getContents();

        return ($arr = json_decode($response, true)) ? $arr : [];
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