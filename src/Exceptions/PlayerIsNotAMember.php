<?php

declare(strict_types=1);

namespace RuneStat\Exceptions;

class PlayerIsNotAMember extends Base
{
    public function __construct(string $rsn)
    {
        parent::__construct(
            sprintf('Player [%s] is not a member', $rsn)
        );
    }
}
