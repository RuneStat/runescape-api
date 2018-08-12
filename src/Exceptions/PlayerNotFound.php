<?php

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
