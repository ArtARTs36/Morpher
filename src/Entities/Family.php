<?php

namespace ArtARTs36\Morpher\Entities;

class Family
{
    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function name(): ?string
    {
        return $this->attributes['И'];
    }

    public function patronymic(): ?string
    {
        return $this->attributes['О'] ?? null;
    }

    public function lastName(): ?string
    {
        return $this->attributes['Ф'] ?? null;
    }
}
