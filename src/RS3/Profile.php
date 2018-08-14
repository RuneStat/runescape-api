<?php

declare(strict_types=1);

namespace RuneStat\RS3;

use RuneStat\RS3\Activities\Repository as Activities;
use RuneStat\RS3\Stats\Repository as Stats;
use RuneStat\RS3\Stats\Stat;

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

    /**
     * @var int
     */
    private $totalXp;

    /**
     * @var int
     */
    private $totalLevel;

    /**
     * @var int
     */
    private $totalVirtualLevel;

    /**
     * @var int
     */
    private $rank;

    public function __construct(Stats $stats, Activities $activities, int $totalXp, int $totalLevel, int $rank)
    {
        $this->stats = $stats;
        $this->activities = $activities;
        $this->totalXp = $totalXp;
        $this->totalLevel = $totalLevel;
        $this->rank = $rank;

        $this->totalVirtualLevel = array_reduce($stats->all(), function (int $carry, Stat $stat) {
            return $carry + $stat->getVirtualLevel();
        }, 0);
    }

    public function getStats(): Stats
    {
        return $this->stats;
    }

    public function getActivities(): Activities
    {
        return $this->activities;
    }

    public function getTotalXp(): int
    {
        return $this->totalXp;
    }

    public function getTotalLevel(): int
    {
        return $this->totalLevel;
    }

    public function getTotalVirtualLevel(): int
    {
        return $this->totalVirtualLevel;
    }

    public function getRank(): int
    {
        return $this->rank;
    }
}
