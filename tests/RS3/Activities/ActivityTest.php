<?php

namespace Tests\RS3\Activities;

use DateTime;
use PHPUnit\Framework\TestCase;
use RuneStat\RS3\Activities\Activity;

class ActivityTest extends TestCase
{
    /** @test */
    public function it_should_instantiate()
    {
        $activity = new Activity(
            new DateTime(),
            'Levelled up Construction.',
            'I levelled my  Construction skill, I am now level 96.'
        );

        $this->assertInstanceOf(Activity::class, $activity);
    }

    /** @test */
    public function it_should_return_the_date()
    {
        $activity = new Activity(
            new DateTime(),
            'Levelled up Construction.',
            'I levelled my  Construction skill, I am now level 96.'
        );

        $this->assertInstanceOf(DateTime::class, $activity->getDate());
    }

    /** @test */
    public function it_should_return_the_text()
    {
        $activity = new Activity(
            new DateTime(),
            '22000000XP in Thieving',
            'I now have at least 22000000 experience points in the Thieving skill.'
        );

        $this->assertSame(
            '22000000XP in Thieving',
            $activity->getText()
        );
    }

    /** @test */
    public function it_should_return_the_details()
    {
        $activity = new Activity(
            new DateTime(),
            'Levelled all skills over 31',
            'By levelling up my Invention skill, I achieved at least level 31 in all skills.'
        );

        $this->assertSame(
            'By levelling up my Invention skill, I achieved at least level 31 in all skills.',
            $activity->getDetails()
        );
    }
}
