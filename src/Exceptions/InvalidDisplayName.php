<?php

declare(strict_types=1);

namespace RuneStat\Exceptions;

class InvalidDisplayName extends Base
{
    public function __construct(string $rsn)
    {
        parent::__construct(
            sprintf('Invalid display name: [%s]', $rsn)
        );
    }
}
