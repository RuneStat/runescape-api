<?php

declare(strict_types=1);

namespace RuneStat;

if (! function_exists('\RuneStat\validate_rsn')) {
    function validate_rsn(string $rsn): bool
    {
        return (bool) preg_match('/^[a-z0-9\-_]{1,12}$/i', $rsn);
    }
}
