<?php

namespace ArtARTs36\Morpher;

use ArtARTs36\Morpher\Contracts\Client;
use ArtARTs36\Morpher\Entities\Adjective;
use ArtARTs36\Morpher\Entities\Date;
use ArtARTs36\Morpher\Entities\Noun;

class Morpher implements Contracts\Morpher
{
    protected const URL_METHOD_DECLENSION = 'russian/declension';
    protected const URL_METHOD_GENDERS = 'russian/genders';
    protected const URL_METHOD_SPELL_DATE = 'russian/spell-date';

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function declineNoun(string $s): Noun
    {
        return new Noun($this->client->get(static::URL_METHOD_DECLENSION, compact('s')), $s);
    }

    public function declineAdjective(string $s): Adjective
    {
        return new Adjective($this->client->get(static::URL_METHOD_GENDERS, compact('s')), $s);
    }

    /**
     * @param \DateTime|string $date
     */
    public function declineDate($date): Date
    {
        if ($date instanceof \DateTime) {
            $date = $date->format('Y-m-d');
        } else {
            $date = date('Y-m-d', strtotime($date));
        }

        return new Date($this->client->get(static::URL_METHOD_SPELL_DATE, compact('date')));
    }
}
