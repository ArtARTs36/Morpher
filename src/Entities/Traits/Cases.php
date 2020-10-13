<?php

namespace ArtARTs36\Morpher\Entities\Traits;

trait Cases
{
    public function nominative(): ?string
    {
        return $this->attributes['И'] ?? null;
    }

    public function dative(): ?string
    {
        return $this->attributes['Д'] ?? null;
    }

    public function genitive(): ?string
    {
        return $this->attributes['Р'] ?? null;
    }

    public function accusative(): ?string
    {
        return $this->attributes['В'] ?? null;
    }

    public function prepositional(): ?string
    {
        return $this->attributes['П'] ?? null;
    }

    public function instrumental(): ?string
    {
        return $this->attributes['Т'] ?? null;
    }
}
