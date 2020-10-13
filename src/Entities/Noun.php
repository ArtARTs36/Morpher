<?php

namespace ArtARTs36\Morpher\Entities;

use ArtARTs36\Morpher\Entities\Traits\Cases;

class Noun
{
    use Cases;

    protected $attributes;

    protected $nominative;

    public function __construct(array $attributes, string $nominative)
    {
        $this->attributes = $attributes;
        $this->nominative = $nominative;
    }

    public function nominative(): string
    {
        return $this->nominative;
    }

    public function pluralNominative(): ?string
    {
        return $this->ofPlural('И');
    }

    public function pluralGenitive(): ?string
    {
        return $this->ofPlural('Р');
    }

    public function pluralDative(): ?string
    {
        return $this->ofPlural('Д');
    }

    public function pluralAccusative(): ?string
    {
        return $this->ofPlural('В');
    }

    public function pluralInstrumental(): ?string
    {
        return $this->ofPlural('Т');
    }

    public function pluralPrepositional(): ?string
    {
        return $this->ofPlural('П');
    }

    public function isPluralExists(): bool
    {
        return ! empty($this->attributes['множественное']);
    }

    public function isFamilyExists(): bool
    {
        return ! empty($this->attributes['ФИО']);
    }

    public function family(): ?Family
    {
        if (! $this->isFamilyExists()) {
            return null;
        }

        return new Family($this->attributes['ФИО']);
    }

    protected function ofPlural(string $key): ?string
    {
        if (! $this->isPluralExists()) {
            return null;
        }

        return $this->attributes['множественное'][$key] ?? null;
    }
}
