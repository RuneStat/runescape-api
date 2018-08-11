<?php

namespace RuneStat\RS3\Skills;

use RuneStat\RS3\Skill;

final class Herblore extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 16;

    /**
     * {@inheritdoc}
     */
    protected $name = 'herblore';

    /**
     * {@inheritdoc}
     */
    protected $maxExperience = 200000000;

    /**
     * {@inheritdoc}
     */
    protected $maxLevel = 99;

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
