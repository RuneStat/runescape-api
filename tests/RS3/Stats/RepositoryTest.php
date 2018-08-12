<?php

namespace Test\RS3\Stats;

use PHPStan\Testing\TestCase;
use RuneStat\RS3\Skills\Agility;
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
    /** @test */
    public function it_should_instantiate()
    {
        $repository = new Repository(
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
            new Stat(new Invention(), 1, 1, 1, 1)
        );

        $this->assertInstanceOf(Repository::class, $repository);
    }

    /** @test */
    public function it_should_take_exception_to_instantiating_with_the_wrong_stat_and_skill()
    {
        $this->expectException(RuntimeException::class);

        new Repository(
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
            new Stat(new Invention(), 1, 1, 1, 1)
        );
    }

    /** @test */
    public function it_should_instantiate_from_the_profile_json()
    {
        $json = '[{"level":111,"xp":433648124,"rank":52231,"id":24},{"level":99,"xp":243815291,"rank":23116,"id":8},{"level":99,"xp":233134127,"rank":75619,"id":6},{"level":99,"xp":229743837,"rank":139931,"id":3},{"level":99,"xp":220544877,"rank":44643,"id":17},{"level":99,"xp":207736756,"rank":38762,"id":11},{"level":99,"xp":195137210,"rank":49687,"id":14},{"level":99,"xp":189329605,"rank":38337,"id":7},{"level":99,"xp":164170785,"rank":109731,"id":2},{"level":99,"xp":150994738,"rank":47219,"id":21},{"level":99,"xp":150893013,"rank":93763,"id":10},{"level":99,"xp":143307743,"rank":62351,"id":9},{"level":99,"xp":138906247,"rank":60798,"id":20},{"level":99,"xp":138471244,"rank":126954,"id":18},{"level":99,"xp":137987307,"rank":164478,"id":4},{"level":99,"xp":134382891,"rank":92142,"id":12},{"level":99,"xp":134258405,"rank":75863,"id":25},{"level":99,"xp":134090628,"rank":123109,"id":5},{"level":99,"xp":133137882,"rank":108449,"id":23},{"level":99,"xp":132558872,"rank":188975,"id":1},{"level":99,"xp":131545148,"rank":182730,"id":0},{"level":99,"xp":130469026,"rank":156731,"id":15},{"level":98,"xp":123619371,"rank":129595,"id":13},{"level":98,"xp":121849555,"rank":101747,"id":16},{"level":97,"xp":109337868,"rank":106033,"id":19},{"level":96,"xp":97480057,"rank":105783,"id":22},{"level":30,"xp":2947080,"rank":189235,"id":26}]';

        $repository = Repository::fromProfileJson(
            json_decode($json, true)
        );

        $this->assertInstanceOf(Repository::class, $repository);
    }

    /** @test */
    public function it_should_find_a_stat_by_the_skill_id()
    {
        $repository = new Repository(
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
            new Stat(new Invention(), 1, 1, 1, 1)
        );

        $stat = $repository->findById(
            (new Runecrafting())->getId()
        );

        $this->assertInstanceOf(Stat::class, $stat);
        $this->assertInstanceOf(Runecrafting::class, $stat->getSkill());
    }

    /** @test */
    public function it_should_find_a_stat_by_the_skill_name()
    {
        $repository = new Repository(
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
            new Stat(new Invention(), 1, 1, 1, 1)
        );

        $stat = $repository->findByName(
            (new Summoning())->getName()
        );

        $this->assertInstanceOf(Stat::class, $stat);
        $this->assertInstanceOf(Summoning::class, $stat->getSkill());
    }

    /** @test */
    public function it_should_find_a_stat_by_the_class_namespace()
    {
        $repository = new Repository(
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
            new Stat(new Invention(), 1, 1, 1, 1)
        );

        $stat = $repository->findByClass(Dungeoneering::class);

        $this->assertInstanceOf(Stat::class, $stat);
        $this->assertInstanceOf(Dungeoneering::class, $stat->getSkill());
    }

    /** @test */
    public function it_should_find_a_stat_by_a_skill_instance()
    {
        $repository = new Repository(
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
            new Stat(new Invention(), 1, 1, 1, 1)
        );

        $stat = $repository->findByClass(new Divination());

        $this->assertInstanceOf(Stat::class, $stat);
        $this->assertInstanceOf(Divination::class, $stat->getSkill());
    }
}
