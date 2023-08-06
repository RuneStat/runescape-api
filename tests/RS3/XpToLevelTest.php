<?php

declare(strict_types=1);

namespace Tests\RS3;

use PHPStan\Testing\TestCase;
use RuneStat\RS3\Skills\Attack;
use RuneStat\RS3\Skills\Dungeoneering;

use function RuneStat\RS3\xp_to_level;

class XpToLevelTest extends TestCase
{
    /** @test */
    public function it_should_calculate_level_one(): void
    {
        $this->assertSame(1, xp_to_level(new Attack(), 1));
    }

    /** @test */
    public function it_should_calculate_level_ninety_nine(): void
    {
        $this->assertSame(99, xp_to_level(new Attack(), 13034431));
    }

    /** @test */
    public function it_should_calculate_level_one_hundred_and_twenty(): void
    {
        $this->assertSame(120, xp_to_level(new Dungeoneering(), 104273167));
    }

    /** @test */
    public function it_should_not_exceed_the_skills_maximum_level(): void
    {
        $this->assertSame(99, xp_to_level(new Attack(), 200000000));
    }

    /** @test */
    public function it_should_calculate_virtual_level_one_hundred_and_eighteen(): void
    {
        $this->assertSame(118, xp_to_level(new Attack(), 85539082, true));
    }

    /** @test */
    public function it_should_not_exceed_the_skills_maximum_virtual_level(): void
    {
        $this->assertSame(120, xp_to_level(new Attack(), 200000000, true));
    }
}
