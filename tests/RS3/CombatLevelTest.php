<?php

declare(strict_types=1);

namespace Tests\RS3;

use PHPUnit\Framework\TestCase;
use function RuneStat\RS3\combat_level;
use RuneStat\RS3\Skills\Attack;
use RuneStat\RS3\Skills\Constitution;
use RuneStat\RS3\Skills\Defence;
use RuneStat\RS3\Skills\Magic;
use RuneStat\RS3\Skills\Prayer;
use RuneStat\RS3\Skills\Ranged;
use RuneStat\RS3\Skills\Strength;
use RuneStat\RS3\Skills\Summoning;
use RuneStat\RS3\Stats\Stat;

class CombatLevelTest extends TestCase
{
    /** @test */
    public function it_calculates_the_minimum_combat_level(): void
    {
        $combat = combat_level(
            new Stat(new Attack(), 1, 1, 1, 1),
            new Stat(new Strength(), 1, 1, 1, 1),
            new Stat(new Magic(), 1, 1, 1, 1),
            new Stat(new Ranged(), 1, 1, 1, 1),
            new Stat(new Defence(), 1, 1, 1, 1),
            new Stat(new Constitution(), 10, 10, 1, 1),
            new Stat(new Prayer(), 1, 1, 1, 1),
            new Stat(new Summoning(), 1, 1, 1, 1)
        );

        $this->assertSame(3, $combat);
    }

    /** @test */
    public function it_calculates_the_maximum_combat_level(): void
    {
        $combat = combat_level(
            new Stat(new Attack(), 99, 1, 1, 1),
            new Stat(new Strength(), 99, 1, 1, 1),
            new Stat(new Magic(), 99, 1, 1, 1),
            new Stat(new Ranged(), 99, 1, 1, 1),
            new Stat(new Defence(), 99, 1, 1, 1),
            new Stat(new Constitution(), 99, 99, 1, 1),
            new Stat(new Prayer(), 99, 1, 1, 1),
            new Stat(new Summoning(), 99, 1, 1, 1)
        );

        $this->assertSame(138, $combat);
    }

    /** @test */
    public function it_calculates_the_combat_level_with_ninety_nine_attack(): void
    {
        $combat = combat_level(
            new Stat(new Attack(), 99, 99, 1, 1),
            new Stat(new Strength(), 1, 1, 1, 1),
            new Stat(new Magic(), 1, 1, 1, 1),
            new Stat(new Ranged(), 1, 1, 1, 1),
            new Stat(new Defence(), 1, 1, 1, 1),
            new Stat(new Constitution(), 10, 10, 1, 1),
            new Stat(new Prayer(), 1, 1, 1, 1),
            new Stat(new Summoning(), 1, 1, 1, 1)
        );

        $this->assertSame(35, $combat);
    }

    /** @test */
    public function it_calculates_the_combat_level_with_ninety_nine_strength(): void
    {
        $combat = combat_level(
            new Stat(new Attack(), 1, 1, 1, 1),
            new Stat(new Strength(), 99, 99, 1, 1),
            new Stat(new Magic(), 1, 1, 1, 1),
            new Stat(new Ranged(), 1, 1, 1, 1),
            new Stat(new Defence(), 1, 1, 1, 1),
            new Stat(new Constitution(), 10, 10, 1, 1),
            new Stat(new Prayer(), 1, 1, 1, 1),
            new Stat(new Summoning(), 1, 1, 1, 1)
        );

        $this->assertSame(35, $combat);
    }

    /** @test */
    public function it_calculates_the_combat_level_with_ninety_nine_magic(): void
    {
        $combat = combat_level(
            new Stat(new Attack(), 1, 1, 1, 1),
            new Stat(new Strength(), 1, 1, 1, 1),
            new Stat(new Magic(), 99, 99, 1, 1),
            new Stat(new Ranged(), 1, 1, 1, 1),
            new Stat(new Defence(), 1, 1, 1, 1),
            new Stat(new Constitution(), 10, 10, 1, 1),
            new Stat(new Prayer(), 1, 1, 1, 1),
            new Stat(new Summoning(), 1, 1, 1, 1)
        );

        $this->assertSame(67, $combat);
    }

    /** @test */
    public function it_calculates_the_combat_level_with_ninety_nine_ranged(): void
    {
        $combat = combat_level(
            new Stat(new Attack(), 1, 1, 1, 1),
            new Stat(new Strength(), 1, 1, 1, 1),
            new Stat(new Magic(), 1, 1, 1, 1),
            new Stat(new Ranged(), 99, 99, 1, 1),
            new Stat(new Defence(), 1, 1, 1, 1),
            new Stat(new Constitution(), 10, 10, 1, 1),
            new Stat(new Prayer(), 1, 1, 1, 1),
            new Stat(new Summoning(), 1, 1, 1, 1)
        );

        $this->assertSame(67, $combat);
    }

    /** @test */
    public function it_calculates_the_combat_level_with_ninety_nine_defence(): void
    {
        $combat = combat_level(
            new Stat(new Attack(), 1, 1, 1, 1),
            new Stat(new Strength(), 1, 1, 1, 1),
            new Stat(new Magic(), 1, 1, 1, 1),
            new Stat(new Ranged(), 1, 1, 1, 1),
            new Stat(new Defence(), 99, 99, 1, 1),
            new Stat(new Constitution(), 10, 10, 1, 1),
            new Stat(new Prayer(), 1, 1, 1, 1),
            new Stat(new Summoning(), 1, 1, 1, 1)
        );

        $this->assertSame(27, $combat);
    }

    /** @test */
    public function it_calculates_the_combat_level_with_ninety_nine_constitution(): void
    {
        $combat = combat_level(
            new Stat(new Attack(), 1, 1, 1, 1),
            new Stat(new Strength(), 1, 1, 1, 1),
            new Stat(new Magic(), 1, 1, 1, 1),
            new Stat(new Ranged(), 1, 1, 1, 1),
            new Stat(new Defence(), 1, 1, 1, 1),
            new Stat(new Constitution(), 99, 9, 1, 1),
            new Stat(new Prayer(), 1, 1, 1, 1),
            new Stat(new Summoning(), 1, 1, 1, 1)
        );

        $this->assertSame(25, $combat);
    }

    /** @test */
    public function it_calculates_the_combat_level_with_ninety_nine_prayer(): void
    {
        $combat = combat_level(
            new Stat(new Attack(), 1, 1, 1, 1),
            new Stat(new Strength(), 1, 1, 1, 1),
            new Stat(new Magic(), 1, 1, 1, 1),
            new Stat(new Ranged(), 1, 1, 1, 1),
            new Stat(new Defence(), 1, 1, 1, 1),
            new Stat(new Constitution(), 10, 10, 1, 1),
            new Stat(new Prayer(), 99, 99, 1, 1),
            new Stat(new Summoning(), 1, 1, 1, 1)
        );

        $this->assertSame(15, $combat);
    }

    /** @test */
    public function it_calculates_the_combat_level_with_ninety_nine_summoning(): void
    {
        $combat = combat_level(
            new Stat(new Attack(), 1, 1, 1, 1),
            new Stat(new Strength(), 1, 1, 1, 1),
            new Stat(new Magic(), 1, 1, 1, 1),
            new Stat(new Ranged(), 1, 1, 1, 1),
            new Stat(new Defence(), 1, 1, 1, 1),
            new Stat(new Constitution(), 10, 10, 1, 1),
            new Stat(new Prayer(), 1, 1, 1, 1),
            new Stat(new Summoning(), 99, 99, 1, 1)
        );

        $this->assertSame(15, $combat);
    }
}
