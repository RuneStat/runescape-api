<?php

namespace RuneStat\RS3;

use RuneStat\RS3\Skills\Repository as SkillRepository;

if ( ! function_exists('\RuneStat\RS3\xp_to_level'))
{
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

if ( ! function_exists('\RuneStat\RS3\xp_to_virtual_level'))
{
    function xp_to_virtual_level(Skill $skill, int $xp): int
    {
        return \RuneStat\RS3\xp_to_level($skill, $xp, true);
    }
}

if ( ! function_exists('\RuneStat\RS3\skill_from_id'))
{
    function skill_from_id(int $id): ?Skill
    {
        $repository = new SkillRepository();

        return $repository->findById($id);
    }
}

if ( ! function_exists('\RuneStat\RS3\validate_rsn'))
{
    function validate_rsn(string $rsn): bool
    {
        return (bool) preg_match('/^[a-z0-9\-_]{1,12}$/i', $rsn);
    }
}
