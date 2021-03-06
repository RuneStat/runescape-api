<?php

declare(strict_types=1);

namespace RuneStat\Exceptions;

class PlayerNotFound extends Base
{
    public function __construct(string $rsn)
    {
        parent::__construct(
            sprintf('Player [%s] not found', $rsn)
        );
    }
}
