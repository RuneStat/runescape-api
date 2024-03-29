<?php

declare(strict_types=1);

namespace Tests\RS3\Skills;

use IteratorAggregate;
use PHPUnit\Framework\TestCase;
use RuneStat\RS3\Skills\Farming;
use RuneStat\RS3\Skills\Fishing;
use RuneStat\RS3\Skills\Mining;
use RuneStat\RS3\Skills\Repository;
use RuneStat\RS3\Skills\Smithing;

class RepositoryTest extends TestCase
{
    protected ?Repository $repository;

    public function setUp(): void
    {
        parent::setUp();

        $this->repository = new Repository();
    }

    public function tearDown(): void
    {
        $this->repository = null;

        parent::tearDown();
    }

    /** @test */
    public function it_should_implement_iterator_aggregate(): void
    {
        $this->assertInstanceOf(IteratorAggregate::class, $this->repository);
    }

    /** @test */
    public function it_returns_an_array_of_all_skills(): void
    {
        $this->assertTrue(is_array($this->repository->all()));
    }

    /** @test */
    public function it_finds_a_skill_by_its_id(): void
    {
        $this->assertInstanceOf(Fishing::class, $this->repository->findById(
            (new Fishing())->getId()
        ));
    }

    /** @test */
    public function it_finds_a_skill_by_its_name(): void
    {
        $this->assertInstanceOf(Farming::class, $this->repository->findByName(
            (new Farming())->getName()
        ));
    }

    /** @test */
    public function it_finds_a_skill_by_its_class(): void
    {
        $this->assertInstanceOf(Mining::class, $this->repository->findByClass(
            Mining::class
        ));
    }

    /** @test */
    public function it_finds_a_skill_by_a_skill_instance(): void
    {
        $this->assertInstanceOf(Smithing::class, $this->repository->findByClass(
            new Smithing()
        ));
    }
}
