<?php

declare(strict_types=1);

namespace RuneStat\RS3;

abstract class Skill
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $maxExperience;

    /**
     * @var int
     */
    protected $maxLevel;

    /**
     * @var int
     */
    protected $maxVirtualLevel;

    /**
     * @var bool
     */
    protected $isCombat;

    /**
     * @var bool
     */
    protected $isMembers;

    /**
     * @var bool
     */
    protected $isElite;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMaxExperience(): int
    {
        return $this->maxExperience;
    }

    public function getMaxLevel(): int
    {
        return $this->maxLevel;
    }

    public function getMaxVirtualLevel(): int
    {
        return $this->maxVirtualLevel;
    }

    public function isCombat(): bool
    {
        return $this->isCombat;
    }

    public function isMembers(): bool
    {
        return $this->isMembers;
    }

    public function isElite(): bool
    {
        return $this->isElite;
    }
}
