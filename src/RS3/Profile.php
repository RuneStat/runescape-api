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

    public static function fromProfileJson(array $raw): Profile
    {
        $stats = Stats::fromProfileJson($raw);
        $activities = Activities::fromProfileJson($raw['activities']);

        return new static(
            $stats,
            $activities
        );
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
