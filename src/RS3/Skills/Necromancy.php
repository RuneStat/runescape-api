<?php

declare(strict_types=1);

namespace RuneStat\RS3\Skills;

use RuneStat\RS3\Skill;

final class Necromancy extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 29;

    /**
     * {@inheritdoc}
     */
    protected $name = 'necromancy';

    /**
     * {@inheritdoc}
     */
    protected $maxExperience = 200000000;

    /**
     * {@inheritdoc}
     */
    protected $maxLevel = 120;

    /**
     * {@inheritdoc}
     */
    protected $maxVirtualLevel = 120;

    /**
     * {@inheritdoc}
     */
    protected $isCombat = true;

    /**
     * {@inheritdoc}
     */
    protected $isMembers = true;

    /**
     * {@inheritdoc}
     */
    protected $isElite = false;
}
