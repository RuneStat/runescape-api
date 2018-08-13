<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use function RuneStat\goal_progress;

class GoalProgressTest extends TestCase
{
    /** @test */
    public function it_calculates_a_basic_goal()
    {
        $this->assertSame(10.0, goal_progress(0, 100, 10));
    }

    /** @test */
    public function it_calculates_a_goal_from_level_one_to_level_ninety_nine()
    {
        $this->assertSame(50.00028386358284, goal_progress(1, 13034431, 6517253));
    }

    /** @test */
    public function it_calculates_a_goal_from_level_ninety_nine_to_one_hundred_and_twenty()
    {
        $this->assertSame(42.85727719857934, goal_progress(13034431, 104273167, 52136869));
    }

    /** @test */
    public function it_calculates_a_goal_from_level_one_hundred_and_twenty_to_max_xp()
    {
        $this->assertSame(62.678350593714924, goal_progress(104273167, 200000000, 164273167));
    }
}
