<?php

declare(strict_types=1);

namespace RuneStat\RS3;

use RuneStat\RS3\Activities\Repository as Activities;
use RuneStat\RS3\Stats\Repository as Stats;

class Profile
{
    /**
     * @var Stats
     */
    private $stats;

    /**
     * @var Activities
     */
    private $activities;

    public function __construct(Stats $stats, Activities $activities)
    {
        $this->stats = $stats;
        $this->activities = $activities;
    }

    public function getStats(): Stats
    {
        return $this->stats;
    }

    public function getActivities(): Activities
    {
        return $this->activities;
    }
}
