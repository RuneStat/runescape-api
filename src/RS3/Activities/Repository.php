<?php

declare(strict_types=1);

namespace RuneStat\RS3\Activities;

use DateTime;

class Repository
{
    /**
     * @var Activity[]
     */
    private $activities;

    public function __construct(array $activities)
    {
        $this->activities = $activities;
    }

    public static function fromProfileJson(array $raw): self
    {
        $activities = [];

        foreach ($raw['activities'] as $data) {
            array_push($activities, new Activity(
                DateTime::createFromFormat('d-M-Y H:i', $data['date']),
                $data['text'],
                $data['details']
            ));
        }

        return new self($activities);
    }

    public function getActivities(): array
    {
        return $this->activities;
    }
}
