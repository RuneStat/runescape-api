<?php

namespace RuneStat\RS3\Skills;

use RuneStat\RS3\Skill;

final class Crafting extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 13;

    /**
     * {@inheritdoc}
     */
    protected $name = 'crafting';

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
    protected $isMembers = false;

    /**
     * {@inheritdoc}
     */
    protected $isElite = false;
}
