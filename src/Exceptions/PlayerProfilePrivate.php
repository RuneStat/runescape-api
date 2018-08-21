<?php

declare(strict_types=1);

namespace RuneStat\Exceptions;

class PlayerProfilePrivate extends Base
{
    public function __construct(string $rsn)
    {
        parent::__construct(
            sprintf('Player [%s] has their profile set to private', $rsn)
        );
    }
}
