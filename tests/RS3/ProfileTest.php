<?php

namespace Tests\RS3;

use PHPUnit\Framework\TestCase;
use RuneStat\RS3\Activities\Repository as Activities;
use RuneStat\RS3\Profile;
use RuneStat\RS3\Skills\Agility;
use RuneStat\RS3\Skills\Attack;
use RuneStat\RS3\Skills\Constitution;
use RuneStat\RS3\Skills\Construction;
use RuneStat\RS3\Skills\Cooking;
use RuneStat\RS3\Skills\Crafting;
use RuneStat\RS3\Skills\Defence;
use RuneStat\RS3\Skills\Divination;
use RuneStat\RS3\Skills\Dungeoneering;
use RuneStat\RS3\Skills\Farming;
use RuneStat\RS3\Skills\Firemaking;
use RuneStat\RS3\Skills\Fishing;
use RuneStat\RS3\Skills\Fletching;
use RuneStat\RS3\Skills\Herblore;
use RuneStat\RS3\Skills\Hunter;
use RuneStat\RS3\Skills\Invention;
use RuneStat\RS3\Skills\Magic;
use RuneStat\RS3\Skills\Mining;
use RuneStat\RS3\Skills\Prayer;
use RuneStat\RS3\Skills\Ranged;
use RuneStat\RS3\Skills\Runecrafting;
use RuneStat\RS3\Skills\Slayer;
use RuneStat\RS3\Skills\Smithing;
use RuneStat\RS3\Skills\Strength;
use RuneStat\RS3\Skills\Summoning;
use RuneStat\RS3\Skills\Thieving;
use RuneStat\RS3\Skills\Woodcutting;
use RuneStat\RS3\Stats\Repository as Stats;
use RuneStat\RS3\Stats\Stat;

class ProfileTest extends TestCase
{
    protected function makeStats(): Stats
    {
        return new Stats(
            new Stat(new Attack(), 1, 1, 1, 1),
            new Stat(new Defence(), 1, 1, 1, 1),
            new Stat(new Strength(), 1, 1, 1, 1),
            new Stat(new Constitution(), 1, 1, 1, 1),
            new Stat(new Ranged(), 1, 1, 1, 1),
            new Stat(new Prayer(), 1, 1, 1, 1),
            new Stat(new Magic(), 1, 1, 1, 1),
            new Stat(new Cooking(), 1, 1, 1, 1),
            new Stat(new Woodcutting(), 1, 1, 1, 1),
            new Stat(new Fletching(), 1, 1, 1, 1),
            new Stat(new Fishing(), 1, 1, 1, 1),
            new Stat(new Firemaking(), 1, 1, 1, 1),
            new Stat(new Crafting(), 1, 1, 1, 1),
            new Stat(new Smithing(), 1, 1, 1, 1),
            new Stat(new Mining(), 1, 1, 1, 1),
            new Stat(new Herblore(), 1, 1, 1, 1),
            new Stat(new Agility(), 1, 1, 1, 1),
            new Stat(new Thieving(), 1, 1, 1, 1),
            new Stat(new Slayer(), 1, 1, 1, 1),
            new Stat(new Farming(), 1, 1, 1, 1),
            new Stat(new Runecrafting(), 1, 1, 1, 1),
            new Stat(new Hunter(), 1, 1, 1, 1),
            new Stat(new Construction(), 1, 1, 1, 1),
            new Stat(new Summoning(), 1, 1, 1, 1),
            new Stat(new Dungeoneering(), 1, 1, 1, 1),
            new Stat(new Divination(), 1, 1, 1, 1),
            new Stat(new Invention(), 1, 1, 1, 1)
        );
    }

    /** @test */
    public function it_should_instantiate()
    {
        $profile = new Profile(
            $this->makeStats(),
            new Activities([])
        );

        $this->assertInstanceOf(Profile::class, $profile);
    }

    /** @test */
    public function it_should_return_the_profile_stats()
    {
        $profile = new Profile(
            $this->makeStats(),
            new Activities([])
        );

        $this->assertInstanceOf(Stats::class, $profile->getStats());
    }

    /** @test */
    public function it_should_return_the_profile_activities()
    {
        $profile = new Profile(
            $this->makeStats(),
            new Activities([])
        );

        $this->assertInstanceOf(Activities::class, $profile->getActivities());
    }
}
