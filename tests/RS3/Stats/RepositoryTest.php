<?php

declare(strict_types=1);

namespace Tests\RS3\Stats;

use IteratorAggregate;
use PHPUnit\Framework\TestCase;
use RuneStat\RS3\Skills\Agility;
use RuneStat\RS3\Skills\Archaeology;
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
use RuneStat\RS3\Stats\Repository;
use RuneStat\RS3\Stats\Stat;
use RuntimeException;

class RepositoryTest extends TestCase
{
    protected ?Repository $repository;

    public function setUp(): void
    {
        parent::setUp();

        $this->repository = new Repository(
            28,
            5600000000,
            27081,
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
            new Stat(new Invention(), 1, 1, 1, 1),
            new Stat(new Archaeology(), 1, 1, 1, 1)
        );
    }

    public function tearDown(): void
    {
        $this->repository = null;

        parent::tearDown();
    }

    /** @test */
    public function it_should_instantiate(): void
    {
        $this->assertInstanceOf(Repository::class, $this->repository);
    }

    /** @test */
    public function it_implements_iterator_aggregate(): void
    {
        $this->assertInstanceOf(IteratorAggregate::class, $this->repository);
    }

    /** @test */
    public function it_should_take_exception_to_instantiating_with_the_wrong_stat_and_skill(): void
    {
        $this->expectException(RuntimeException::class);

        new Repository(
            28,
            28,
            1,
            new Stat(new Defence(), 1, 1, 1, 1),
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
            new Stat(new Invention(), 1, 1, 1, 1),
            new Stat(new Archaeology(), 1, 1, 1, 1)
        );
    }

    /** @test */
    public function it_should_allow_a_null_overall_rank(): void
    {
        $repository = new Repository(
            28,
            5600000000,
            null,
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
            new Stat(new Invention(), 1, 1, 1, 1),
            new Stat(new Archaeology(), 1, 1, 1, 1)
        );

        $this->assertInstanceOf(Repository::class, $repository);
    }

    /** @test */
    public function it_should_instantiate_from_the_profile_json(): void
    {
        $json = file_get_contents(__DIR__ . '/profile.json');

        $repository = Repository::fromProfileJson(
            json_decode($json, true)
        );

        $this->assertInstanceOf(Repository::class, $repository);
    }

    /** @test */
    public function it_should_handle_non_decimal_experience_that_the_runemetrics_api_returns(): void
    {
        $json = file_get_contents(__DIR__ . '/profile.json');

        $repository = Repository::fromProfileJson(
            json_decode($json, true)
        );

        $this->assertSame(99, $repository->findByClass(new Attack())->getLevel());
    }

    /** @test */
    public function it_should_return_all_stats(): void
    {
        $this->assertCount(28, $this->repository->all());
    }

    /** @test */
    public function it_should_find_a_stat_by_the_skill_id(): void
    {
        $stat = $this->repository->findById(
            (new Runecrafting())->getId()
        );

        $this->assertInstanceOf(Stat::class, $stat);
        $this->assertInstanceOf(Runecrafting::class, $stat->getSkill());
    }

    /** @test */
    public function it_should_find_a_stat_by_the_skill_name(): void
    {
        $stat = $this->repository->findByName(
            (new Summoning())->getName()
        );

        $this->assertInstanceOf(Stat::class, $stat);
        $this->assertInstanceOf(Summoning::class, $stat->getSkill());
    }

    /** @test */
    public function it_should_find_a_stat_by_the_class_namespace(): void
    {
        $stat = $this->repository->findByClass(Dungeoneering::class);

        $this->assertInstanceOf(Stat::class, $stat);
        $this->assertInstanceOf(Dungeoneering::class, $stat->getSkill());
    }

    /** @test */
    public function it_should_find_a_stat_by_a_skill_instance(): void
    {
        $stat = $this->repository->findByClass(new Divination());

        $this->assertInstanceOf(Stat::class, $stat);
        $this->assertInstanceOf(Divination::class, $stat->getSkill());
    }

    /** @test */
    public function it_should_return_the_total_experience(): void
    {
        $this->assertSame(5600000000, $this->repository->getTotalExperience());
    }

    /** @test */
    public function it_should_return_the_total_level(): void
    {
        $this->assertSame(28, $this->repository->getTotalLevel());
    }

    /** @test */
    public function it_should_return_the_rank(): void
    {
        $this->assertSame(27081, $this->repository->getRank());
    }

    /** @test */
    public function it_should_calculate_the_total_virtual_level(): void
    {
        $repository = new Repository(
            2736,
            601991332,
            1,
            new Stat(new Attack(), 99, 120, 1, 1),
            new Stat(new Defence(), 99, 120, 1, 1),
            new Stat(new Strength(), 99, 120, 1, 1),
            new Stat(new Constitution(), 99, 120, 1, 1),
            new Stat(new Ranged(), 99, 120, 1, 1),
            new Stat(new Prayer(), 99, 120, 1, 1),
            new Stat(new Magic(), 99, 120, 1, 1),
            new Stat(new Cooking(), 99, 120, 1, 1),
            new Stat(new Woodcutting(), 99, 120, 1, 1),
            new Stat(new Fletching(), 99, 120, 1, 1),
            new Stat(new Fishing(), 99, 120, 1, 1),
            new Stat(new Firemaking(), 99, 120, 1, 1),
            new Stat(new Crafting(), 99, 120, 1, 1),
            new Stat(new Smithing(), 99, 120, 1, 1),
            new Stat(new Mining(), 99, 120, 1, 1),
            new Stat(new Herblore(), 99, 120, 1, 1),
            new Stat(new Agility(), 99, 120, 1, 1),
            new Stat(new Thieving(), 99, 120, 1, 1),
            new Stat(new Slayer(), 120, 120, 1, 1),
            new Stat(new Farming(), 99, 120, 1, 1),
            new Stat(new Runecrafting(), 99, 120, 1, 1),
            new Stat(new Hunter(), 99, 120, 1, 1),
            new Stat(new Construction(), 99, 120, 1, 1),
            new Stat(new Summoning(), 99, 120, 1, 1),
            new Stat(new Dungeoneering(), 120, 120, 1, 1),
            new Stat(new Divination(), 99, 120, 1, 1),
            new Stat(new Invention(), 120, 150, 1, 1),
            new Stat(new Archaeology(), 120, 120, 1, 1)
        );

        $this->assertSame(3390, $repository->getTotalVirtualLevel());
    }

    /** @test */
    public function it_should_handle_skills_that_are_not_ranked(): void
    {
        $json = file_get_contents(__DIR__ . '/profile_with_no_ranks.json');

        $repository = Repository::fromProfileJson(
            json_decode($json, true)
        );

        $this->assertInstanceOf(Repository::class, $repository);
    }
}
