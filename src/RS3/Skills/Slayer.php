<?php

namespace RuneStat\RS3\Skills;

use RuneStat\RS3\Skill;

final class Slayer extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 19;

    /**
     * {@inheritdoc}
     */
    protected $name = 'slayer';

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
    protected $isCombat = false;

    /**
     * {@inheritdoc}
     */
    protected $isMembers = true;

    /**
     * {@inheritdoc}
     */
    protected $isElite = false;
}
