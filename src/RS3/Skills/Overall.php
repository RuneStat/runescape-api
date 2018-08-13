<?php

declare(strict_types=1);

namespace RuneStat\RS3\Skills;

use RuneStat\RS3\Skill;

final class Overall extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 0;

    /**
     * {@inheritdoc}
     */
    protected $name = 'overall';

    /**
     * {@inheritdoc}
     */
    protected $maxExperience = 5400000000;

    /**
     * {@inheritdoc}
     */
    protected $maxLevel = 2715;

    /**
     * {@inheritdoc}
     */
    protected $maxVirtualLevel = 3270;

    /**
     * {@inheritdoc}
     */
    protected $isCombat = false;

    /**
     * {@inheritdoc}
     */
    protected $isMembers = false;

    /**
     * {@inheritdoc}
     */
    protected $isElite = false;
}
