<?php

namespace RuneStat\RS3\Skills;

use RuneStat\RS3\Skill;

final class Divination extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 26;

    /**
     * {@inheritdoc}
     */
    protected $name = 'divination';

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
