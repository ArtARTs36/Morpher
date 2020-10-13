<?php

namespace ArtARTs36\Morpher\Entities;

class Adjective
{
    protected $attributes;

    protected $female;

    public function __construct(array $attributes, string $female)
    {
        $this->validate($attributes);

        $this->attributes = $attributes;
        $this->female = $female;
    }

    public function female(): string
    {
        return $this->female;
    }

    public function male(): ?string
    {
        return $this->attributes['feminine'] ?? null;
    }

    public function neutral(): ?string
    {
        return $this->attributes['neuter'] ?? null;
    }

    public function plural(): ?string
    {
        return $this->attributes['plural'] ?? null;
    }

    /**
     * @link https://morpher.ru/ws3/#GetAdjectiveGenders
     */
    protected function validate(array $attributes): void
    {
        if (empty(array_filter($attributes, function (string $value) {
            return $value !== 'ERROR';
        }))) {
            throw new \LogicException('Given Incorrect Data');
        }
    }
}
