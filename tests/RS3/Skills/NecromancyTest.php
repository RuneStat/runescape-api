<?php

declare(strict_types=1);

namespace Tests\RS3\Skills;

use PHPUnit\Framework\TestCase;
use RuneStat\RS3\Skill;
use RuneStat\RS3\Skills\Necromancy;

class NecromancyTest extends TestCase
{
    protected ?Necromancy $skill;

    public function setUp(): void
    {
        parent::setUp();

        $this->skill = new Necromancy();
    }

    public function tearDown(): void
    {
        $this->skill = null;

        parent::tearDown();
    }

    /** @test */
    public function it_should_extend_the_base_skill_class(): void
    {
        $this->assertInstanceOf(Skill::class, $this->skill);
    }

    /** @test */
    public function it_should_return_an_id(): void
    {
        $this->assertSame(29, $this->skill->getId());
    }

    /** @test */
    public function it_should_return_a_skill_name(): void
    {
        $this->assertSame('necromancy', $this->skill->getName());
    }

    /** @test */
    public function it_should_return_the_maximum_experience(): void
    {
        $this->assertSame(200000000, $this->skill->getMaxExperience());
    }

    /** @test */
    public function it_should_return_an_max_level(): void
    {
        $this->assertSame(120, $this->skill->getMaxLevel());
    }

    /** @test */
    public function it_should_return_a_max_virtual_level(): void
    {
        $this->assertSame(120, $this->skill->getMaxVirtualLevel());
    }

    /** @test */
    public function it_should_return_if_its_a_combat_skill(): void
    {
        $this->assertTrue($this->skill->isCombat());
    }

    /** @test */
    public function it_should_return_if_its_a_members_only_skill(): void
    {
        $this->assertTrue($this->skill->isMembers());
    }

    /** @test */
    public function it_should_return_if_its_an_elite_skill(): void
    {
        $this->assertFalse($this->skill->isElite());
    }
}
