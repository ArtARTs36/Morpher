<?php

namespace ArtARTs36\Morpher\Contracts;

interface Client
{
    public function get(string $url, array $params = []): array;
}
