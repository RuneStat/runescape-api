<?php

declare(strict_types=1);

namespace RuneStat\Exceptions;

class UnknownError extends Base
{
    /**
     * @param mixed $code
     */
    public function __construct($code)
    {
        parent::__construct('An unhandled error occured: ' . $code);
    }
}
