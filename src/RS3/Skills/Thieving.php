<?php

namespace RuneStat\RS3\Skills;

use RuneStat\RS3\Skill;

final class Thieving extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 18;

    /**
     * {@inheritdoc}
     */
    protected $name = 'thieving';

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
