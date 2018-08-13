<?php

declare(strict_types=1);

namespace RuneStat\RS3\Activities;

use DateTime;

class Activity
{
    /**
     * @var DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $text;

    /**
     * @var string
     */
    private $details;

    public function __construct(DateTime $date, string $text, string $details)
    {
        $this->date = $date;
        $this->text = $text;
        $this->details = $details;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getDetails(): string
    {
        return $this->details;
    }
}
