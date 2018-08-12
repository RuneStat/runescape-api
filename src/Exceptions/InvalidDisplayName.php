<?php

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
