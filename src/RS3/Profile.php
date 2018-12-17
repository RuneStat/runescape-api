<?php

declare(strict_types=1);

namespace RuneStat\RS3;

use function RuneStat\RS3\combat_level;
use RuneStat\RS3\Activities\Repository as Activities;
use RuneStat\RS3\Stats\Repository as Stats;
use RuneStat\RS3\Skills\Attack;
use RuneStat\RS3\Skills\Strength;
use RuneStat\RS3\Skills\Defence;
use RuneStat\RS3\Skills\Magic;
use RuneStat\RS3\Skills\Prayer;
use RuneStat\RS3\Skills\Ranged;
use RuneStat\RS3\Skills\Summoning;
use RuneStat\RS3\Skills\Constitution;

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
        $activities = Activities::fromProfileJson($raw);

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

    public function getCombatLevel(): int
    {
        return combat_level(
            $this->stats->findByClass(Attack::class),
            $this->stats->findByClass(Strength::class),
            $this->stats->findByClass(Magic::class),
            $this->stats->findByClass(Ranged::class),
            $this->stats->findByClass(Defence::class),
            $this->stats->findByClass(Constitution::class),
            $this->stats->findByClass(Prayer::class),
            $this->stats->findByClass(Summoning::class)
        );
    }
}
