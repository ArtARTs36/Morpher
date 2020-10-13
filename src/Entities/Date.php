<?php

namespace ArtARTs36\Morpher\Entities;

use ArtARTs36\Morpher\Entities\Traits\Cases;

class Date
{
    use Cases;

    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }
}
