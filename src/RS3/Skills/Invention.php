<?php

declare(strict_types=1);

namespace RuneStat\RS3\Skills;

use RuneStat\RS3\Skill;

final class Invention extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 27;

    /**
     * {@inheritdoc}
     */
    protected $name = 'invention';

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
    protected $maxVirtualLevel = 150;

    /**
     * {@inheritdoc}
     */
    protected $isCombat = false;

    /**
     * {@inheritdoc}
     */
    protected $isMembers = true;

    /**
     * {@inheritdoc}
     */
    protected $isElite = true;
}
