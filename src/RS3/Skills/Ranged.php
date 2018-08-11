<?php

namespace RuneStat\RS3\Skills;

use RuneStat\RS3\Skill;

final class Ranged extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 5;

    /**
     * {@inheritdoc}
     */
    protected $name = 'ranged';

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
    protected $isCombat = true;

    /**
     * {@inheritdoc}
     */
    protected $isMembers = false;

    /**
     * {@inheritdoc}
     */
    protected $isElite = false;
}
