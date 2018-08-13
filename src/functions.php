<?php

declare(strict_types=1);

namespace RuneStat;

if (! function_exists('\RuneStat\validate_rsn')) {
    function validate_rsn(string $rsn): bool
    {
        return (bool) preg_match('/^[a-z0-9\-_]{1,12}$/i', $rsn);
    }
}

if (! function_exists('\RuneStat\goal_progress')) {
    function goal_progress(int $start, int $end, int $current): float
    {
        $goal = $end - $start;
        $gained = $current - $start;

        return ($gained / $goal) * 100;
    }
}
