<?php

declare(strict_types=1);

namespace RuneStat\RS3\Skills;

use ArrayIterator;
use IteratorAggregate;
use RuneStat\RS3\Skill;

class Repository implements IteratorAggregate
{
    /**
     * @var Skill[]
     */
    protected $skills;

    public function __construct()
    {
        $this->skills = [
            new Overall(),
            new Attack(),
            new Defence(),
            new Strength(),
            new Constitution(),
            new Ranged(),
            new Prayer(),
            new Magic(),
            new Cooking(),
            new Woodcutting(),
            new Fletching(),
            new Fishing(),
            new Firemaking(),
            new Crafting(),
            new Smithing(),
            new Mining(),
            new Herblore(),
            new Agility(),
            new Thieving(),
            new Slayer(),
            new Farming(),
            new Runecrafting(),
            new Hunter(),
            new Construction(),
            new Summoning(),
            new Dungeoneering(),
            new Divination(),
            new Invention(),
        ];
    }

    /**
     * Get all skills for RS3
     *
     * @return Skill[]
     */
    public function getSkills(): array
    {
        return $this->skills;
    }

    /**
     * Find a skill by its ID
     *
     * @param int $id
     * @return Skill|null
     */
    public function findById(int $id): ?Skill
    {
        foreach ($this->skills as $skill) {
            if ($id === $skill->getId()) {
                return $skill;
            }
        }

        return null;
    }

    /**
     * Find a skill by its name
     *
     * @param string $name
     * @return Skill|null
     */
    public function findByName(string $name): ?Skill
    {
        $name = mb_strtolower($name);

        foreach ($this->skills as $skill) {
            if (mb_strtolower($skill->getName()) === $name) {
                return $skill;
            }
        }

        return null;
    }

    /**
     * @param Skill|string $needle
     * @return Skill|null
     */
    public function findByClass($needle): ?Skill
    {
        $needle = $needle instanceof Skill ? $needle : new $needle;

        return $this->findById($needle->getId());
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->skills);
    }
}
