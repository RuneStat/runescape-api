<?php

namespace Test\RS3\Stats;

use PHPStan\Testing\TestCase;
use RuneStat\RS3\Skills\Attack;
use RuneStat\RS3\Stats\Stat;

class StatTest extends TestCase
{
    /** @test */
    public function it_should_return_the_stats_skill()
    {
        $stat = new Stat(new Attack(), 1, 1, 1, 1);

        $this->assertInstanceOf(Attack::class, $stat->getSkill());
    }

    /** @test */
    public function it_should_return_the_stats_level()
    {
        $stat = new Stat(new Attack(), 1, 1, 1, 1);

        $this->assertSame(1, $stat->getLevel());
    }

    /** @test */
    public function it_should_return_the_stats_virtual_level()
    {
        $stat = new Stat(new Attack(), 1, 1, 1, 1);

        $this->assertSame(1, $stat->getVirtualLevel());
    }

    /** @test */
    public function it_should_return_the_stats_rank()
    {
        $stat = new Stat(new Attack(), 1, 1, 1, 1);

        $this->assertSame(1, $stat->getRank());
    }

    /** @test */
    public function it_should_return_the_stats_experience()
    {
        $stat = new Stat(new Attack(), 1, 1, 1, 1);

        $this->assertSame(1, $stat->getExperience());
    }
}
