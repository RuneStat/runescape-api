<?php

declare(strict_types=1);

namespace RuneStat\RS3\Stats;

use ArrayIterator;
use IteratorAggregate;
use RuntimeException;
use RuneStat\RS3\Skill;

use function RuneStat\RS3\skill_from_id;
use function RuneStat\RS3\xp_to_virtual_level;

class Repository implements IteratorAggregate
{
    /**
     * Array of Stats keyed by the skill name
     *
     * @var Stat[]
     */
    protected $stats = [];

    /**
     * @var int
     */
    protected $totalExperience;

    /**
     * @var int
     */
    protected $totalLevel;

    /**
     * @var int
     */
    protected $totalVirtualLevel;

    /**
     * @var ?int
     */
    protected $rank;

    public function __construct(
        int $totalLevel,
        int $totalExperience,
        ?int $rank,
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
        Stat $invention,
        Stat $archaeology,
        Stat $necromancy
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
            'invention',
            'archaeology',
            'necromancy'
        );

        $this->validate();

        $this->totalLevel = $totalLevel;
        $this->totalExperience = $totalExperience;
        $this->rank = $rank;
        $this->totalVirtualLevel = array_reduce($this->all(), function (int $carry, Stat $stat) {
            return $carry + $stat->getVirtualLevel();
        }, 0);
    }

    public static function fromProfileJson(array $raw): self
    {
        $stats = [];

        foreach ($raw['skillvalues'] as $data) {
            // For some reason the runemetrics API starts at 0 index and the other endpoints don't 🤷
            $skill = skill_from_id($data['id'] + 1);

            array_push($stats, new Stat(
                $skill,
                $data['level'],
                xp_to_virtual_level($skill, (int) ($data['xp'] / 10)),
                array_key_exists('rank', $data) ? $data['rank'] : null,
                (int) ($data['xp'] / 10)
            ));
        }

        usort($stats, function (Stat $a, Stat $b) {
            return $a->getSkill()->getId() <=> $b->getSkill()->getId();
        });

        return new self(
            $raw['totalskill'],
            $raw['totalxp'],
            is_null($raw['rank']) ? null : (int) preg_replace('/[^0-9]/', '', $raw['rank']),
            ...$stats
        );
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

    public function all(): array
    {
        return array_values($this->stats);
    }

    public function getTotalExperience(): int
    {
        return $this->totalExperience;
    }

    public function getTotalLevel(): int
    {
        return $this->totalLevel;
    }

    public function getTotalVirtualLevel(): int
    {
        return $this->totalVirtualLevel;
    }

    public function getRank(): ?int
    {
        return $this->rank;
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
        $needle = $needle instanceof Skill ? $needle : new $needle();

        return $this->findById($needle->getId());
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator(
            array_values($this->stats)
        );
    }
}
