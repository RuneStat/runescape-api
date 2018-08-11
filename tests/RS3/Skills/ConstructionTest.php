<?php

namespace Tests\RS3\Skills;

use PHPUnit\Framework\TestCase;
use RuneStat\RS3\Skills\Construction;
use RuneStat\RS3\Skill;

class ConstructionTest extends TestCase
{
    /**
     * @var Skill
     */
    protected $skill;

    public function setUp()
    {
        parent::setUp();

        $this->skill = new Construction();
    }

    public function tearDown()
    {
        $this->skill = null;

        parent::tearDown();
    }

    /** @test */
    public function it_should_extend_the_base_skill_class()
    {
        $this->assertInstanceOf(Skill::class, $this->skill);
    }

    /** @test */
    public function it_should_return_an_id()
    {
        $this->assertSame(23, $this->skill->getId());
    }

    /** @test */
    public function it_should_return_a_skill_name()
    {
        $this->assertSame('construction', $this->skill->getName());
    }

    /** @test */
    public function it_should_return_the_maximum_experience()
    {
        $this->assertSame(200000000, $this->skill->getMaxExperience());
    }

    /** @test */
    public function it_should_return_an_max_level()
    {
        $this->assertSame(99, $this->skill->getMaxLevel());
    }

    /** @test */
    public function it_should_return_a_max_virtual_level()
    {
        $this->assertSame(120, $this->skill->getMaxVirtualLevel());
    }

    /** @test */
    public function it_should_return_if_its_a_combat_skill()
    {
        $this->assertFalse($this->skill->isCombat());
    }

    /** @test */
    public function it_should_return_if_its_a_members_only_skill()
    {
        $this->assertTrue($this->skill->isMembers());
    }

    /** @test */
    public function it_should_return_if_its_an_elite_skill()
    {
        $this->assertFalse($this->skill->isElite());
    }
}
