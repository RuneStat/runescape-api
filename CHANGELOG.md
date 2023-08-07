# Change Log

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

## [Unreleased]

## [v2.1.0](https://github.com/RuneStat/runescape-api/releases/tag/v2.1.0)

### Added

- Necromancy 💀

## [v2.0.0](https://github.com/RuneStat/runescape-api/releases/tag/v2.0.0)

### Added

- PHP 8.1 support (#26)
- PHP 8.2 support (#26)
- Guzzle 7 support (Guzzle 6 is still supported) (#25)

### Removed

- PHP 7.4 support (#26)
- PHP 7.3 support (#26)
- PHP 7.2 support (#26)

## [v1.1.0](https://github.com/RuneStat/runescape-api/releases/tag/v1.1.0)

### Added

- Support for the new Archaeology skill

## [v1.0.0](https://github.com/RuneStat/runescape-api/releases/tag/v1.0.0)

### Changed

- CI now builds against PHP 7.2, 7.3 and 7.4 (Previously we just used 7.2)

### Fixed

- Updated maximum level of Herblore to 120
- Updated maximum level of Farming to 120

## [v0.2.1](https://github.com/RuneStat/runescape-api/releases/tag/v0.2.1)

### Fixed

- `Undefined index: rank` error when fetching a profile

## [v0.2.0](https://github.com/RuneStat/runescape-api/releases/tag/v0.2.0)

### Added

- `RuneStat\Exceptions\PlayerIsNotAMember` exception
- `RuneStat\Exceptions\PlayerHasNoProfile` exception

### Fixed

- `RuneStat\RS3\API::getProfile()` will now throw `PlayerIsNotAMember` if RuneMetrics returns `NOT_A_MEMBER` error
- `RuneStat\RS3\API::getProfile()` will now throw `PlayerHasNoProfile` if RuneMetrics returns `NO_PROFILE` error

## [v0.1.3](https://github.com/RuneStat/runescape-api/releases/tag/v0.1.3)

### Fixed

- `RuneStat\validate_rsn` correctly validates display names with spaces

## [v0.1.2](https://github.com/RuneStat/runescape-api/releases/tag/v0.1.2)

### Added

- `RuneStat\Exceptions\PlayerProfilePrivate` exception
- `RuneStat\Exceptions\UnknownError` exception

### Fixed

- `RuneStat\RS3\API::getProfile()` will now throw `PlayerProfilePrivate` if RuneMetrics returns `PRIVATE_PROFILE` error
- `RuneStat\RS3\API::getProfile()` will now throw `UnknownError` if RuneMetrics returns an error we don't handle

## [v0.1.1](https://github.com/RuneStat/runescape-api/releases/tag/v0.1.1)

### Fixed

- `RuneStat\RS3\Stats\Repository::getTotalLevel()` was returning the players total experience and vice-versa. It now returns the correct data

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
