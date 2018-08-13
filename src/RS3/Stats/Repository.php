<?php

declare(strict_types=1);

namespace RuneStat\RS3\Stats;

use RuneStat\RS3\Skill;
use function RuneStat\RS3\xp_to_virtual_level;
use function RuneStat\RS3\skill_from_id;
use RuntimeException;

class Repository
{
    /**
     * Array of Stats keyed by the skill name
     *
     * @var Stat[]
     */
    protected $stats = [];

    public function __construct(
        Stat $attack,
        Stat $defence,
        Stat $strength,
        Stat $constitution,
        Stat $ranged,
        Stat $prayer,
        Stat $magic,
        Stat $cooking,
        Stat $woodcutting,
        Stat $fletching,
        Stat $fishing,
        Stat $firemaking,
        Stat $crafting,
        Stat $smithing,
        Stat $mining,
        Stat $herblore,
        Stat $agility,
        Stat $thieving,
        Stat $slayer,
        Stat $farming,
        Stat $runecrafting,
        Stat $hunter,
        Stat $construction,
        Stat $summoning,
        Stat $dungeoneering,
        Stat $divination,
        Stat $invention
    ) {
        $this->stats = compact(
            'attack',
            'defence',
            'strength',
            'constitution',
            'ranged',
            'prayer',
            'magic',
            'cooking',
            'woodcutting',
            'fletching',
            'fishing',
            'firemaking',
            'crafting',
            'smithing',
            'mining',
            'herblore',
            'agility',
            'thieving',
            'slayer',
            'farming',
            'runecrafting',
            'hunter',
            'construction',
            'summoning',
            'dungeoneering',
            'divination',
            'invention'
        );

        $this->validate();
    }

    public static function fromProfileJson(array $raw): self
    {
        $stats = [];

        foreach ($raw as $data) {
            // For some reason the runemetrics API starts at 0 index and the other endpoints don't 🤷
            $skill = skill_from_id($data['id'] + 1);

            array_push($stats, new Stat(
                $skill,
                $data['level'],
                xp_to_virtual_level($skill, $data['xp']),
                $data['rank'],
                $data['xp']
            ));
        }

        usort($stats, function (Stat $a, Stat $b) {
            return $a->getSkill()->getId() <=> $b->getSkill()->getId();
        });

        return new static(...$stats);
    }

    protected function validate(): void
    {
        foreach ($this->stats as $name => $stat) {
            if ($name !== $stat->getSkill()->getName()) {
                throw new RuntimeException(
                    sprintf(
                        'Stat [%s] did not match skill [%s]',
                        $name,
                        $stat->getSkill()->getName()
                    )
                );
            }
        }
    }

    public function findById(int $id): ?Stat
    {
        foreach ($this->stats as $stat) {
            if ($id === $stat->getSkill()->getId()) {
                return $stat;
            }
        }

        return null;
    }

    public function findByName(string $name): ?Stat
    {
        $name = mb_strtolower($name);

        foreach ($this->stats as $stat) {
            if (mb_strtolower($stat->getSkill()->getName()) === $name) {
                return $stat;
            }
        }

        return null;
    }

    /**
     * @param Skill|string $needle
     * @return null|Stat
     */
    public function findByClass($needle): ?Stat
    {
        $needle = $needle instanceof Skill ? $needle : new $needle;

        return $this->findById($needle->getId());
    }
}
