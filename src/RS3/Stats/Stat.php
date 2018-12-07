<?php

declare(strict_types=1);

namespace RuneStat\RS3\Stats;

use RuneStat\RS3\Skill;

class Stat
{
    /**
     * @var Skill
     */
    protected $skill;

    /**
     * @var int
     */
    protected $level;

    /**
     * @var int
     */
    protected $virtualLevel;

    /**
     * @var int|null
     */
    protected $rank;

    /**
     * @var int
     */
    protected $experience;

    public function __construct(Skill $skill, int $level, int $virtualLevel, ?int $rank, int $experience)
    {
        $this->skill = $skill;
        $this->level = $level;
        $this->virtualLevel = $virtualLevel;
        $this->rank = $rank;
        $this->experience = $experience;
    }

    public function getSkill(): Skill
    {
        return $this->skill;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function getVirtualLevel(): int
    {
        return $this->virtualLevel;
    }

    public function getRank(): ?int
    {
        return $this->rank;
    }

    public function getExperience(): int
    {
        return $this->experience;
    }
}
