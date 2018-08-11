<?php

namespace RuneStat\RS3\Skills;

use RuneStat\RS3\Skill;

final class Strength extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 3;

    /**
     * {@inheritdoc}
     */
    protected $name = 'strength';

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
