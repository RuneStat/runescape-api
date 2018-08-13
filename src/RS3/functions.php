<?php

declare(strict_types=1);

namespace RuneStat\RS3;

use RuneStat\RS3\Skills\Repository as SkillRepository;
use RuneStat\RS3\Stats\Stat;

if (! function_exists('\RuneStat\RS3\xp_to_level')) {
    function xp_to_level(Skill $skill, int $xp, bool $virtual = false): int
    {
        $modifier = 0;

        for ($i = 1; $i <= 120; $i++) {
            $modifier += floor($i + 300 * pow(2, ($i / 7)));
            $level = floor($modifier / 4);
            if ($xp < $level || ($i >= $skill->getMaxLevel() && ! $virtual)) {
                return $i;
            }
        }

        return 120;
    }
}

if (! function_exists('\RuneStat\RS3\xp_to_virtual_level')) {
    function xp_to_virtual_level(Skill $skill, int $xp): int
    {
        return xp_to_level($skill, $xp, true);
    }
}

if (! function_exists('\RuneStat\RS3\skill_from_id')) {
    function skill_from_id(int $id): ?Skill
    {
        $repository = new SkillRepository();

        return $repository->findById($id);
    }
}

if (! function_exists('\RuneStat\RS3\combat_level')) {
    function combat_level(
        Stat $attack,
        Stat $strength,
        Stat $magic,
        Stat $ranged,
        Stat $defence,
        Stat $constitution,
        Stat $prayer,
        Stat $summoning
    ): int {
        $highest = max(
            $attack->getLevel() + $strength->getLevel(),
            2 * $magic->getLevel(),
            2 * $ranged->getLevel()
        );

        $rest = (
            $defence->getLevel() +
            $constitution->getLevel() +
            floor(0.5 * $prayer->getLevel()) + floor(0.5 * $summoning->getLevel())
        );

        return (int) floor(0.25 * ((1.3 * $highest) + $rest));
    }
}
