<?php

namespace ArtARTs36\Morpher\Contracts;

use ArtARTs36\Morpher\Entities\Adjective;
use ArtARTs36\Morpher\Entities\Date;
use ArtARTs36\Morpher\Entities\Noun;

interface Morpher
{
    public function declineNoun(string $word): Noun;

    public function declineAdjective(string $word): Adjective;

    public function declineDate($date): Date;
}
