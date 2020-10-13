<?php

namespace ArtARTs36\Morpher\Exceptions;

use Throwable;

class GivenIncorrectData extends MorpherException
{
    public function __construct($message = 'Given Incorrect Data', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
