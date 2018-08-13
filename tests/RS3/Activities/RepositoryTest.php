<?php

declare(strict_types=1);

namespace Tests\RS3\Activities;

use PHPUnit\Framework\TestCase;
use RuneStat\RS3\Activities\Activity;
use RuneStat\RS3\Activities\Repository;
use DateTime;

class RepositoryTest extends TestCase
{
    /** @test */
    public function it_should_instantiate(): void
    {
        $repository = new Repository([
            new Activity(
                new DateTime(),
                'I killed 3 boss monsters in Daemonheim.',
                'I killed 3 boss monsters   called:  a sagittare and Night-gazer Khighorahk   in Daemonheim.'
            ),
        ]);

        $this->assertInstanceOf(Repository::class, $repository);
    }

    /** @test */
    public function it_should_instantiate_from_the_profile_json(): void
    {
        $json = file_get_contents('./activities.json');

        $repository = Repository::fromProfileJson(
            json_decode($json, true)
        );

        $this->assertInstanceOf(Repository::class, $repository);
    }

    /** @test */
    public function it_should_return_activities(): void
    {
        $repository = new Repository([
            new Activity(
                new DateTime(),
                'I killed 3 boss monsters in Daemonheim.',
                'I killed 3 boss monsters   called:  a sagittare and Night-gazer Khighorahk   in Daemonheim.'
            ),
            new Activity(
                new DateTime(),
                'Levelled up Construction.',
                'I levelled my  Construction skill, I am now level 96.'
            ),
        ]);

        $this->assertSame('I killed 3 boss monsters in Daemonheim.', $repository->getActivities()[0]->getText());
        $this->assertSame('Levelled up Construction.', $repository->getActivities()[1]->getText());
    }
}
