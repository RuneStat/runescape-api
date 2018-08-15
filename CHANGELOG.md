# Change Log

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

## [Unreleased]

## [v0.1.0](https://github.com/RuneStat/runescape-api/releases/tag/v0.1.0)

### Added

- Classes for all skills under the `RuneStat\RS3\Skills` namespace
- Adventurers Log activity
- Player profile and stats
- `RuneStat\RS3\xp_to_level` helper function to calculate the level based on an amount of experience
- `RuneStat\RS3\xp_to_virtual_level` helper function to calculate the virtual level based on an amount of experience
- `RuneStat\RS3\skill_from_id` helper function to find a skill using the ID assigned by Jagex
- `RuneStat\RS3\combat_level` helper function to calculate the users combat level from their stats
- `RuneStat\validate_rsn` helper function to validate a display name
- `RuneStat\goal_progress` helper function to calculate a percentage of progress towards an experience goal