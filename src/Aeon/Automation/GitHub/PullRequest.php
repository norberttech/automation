<?php

declare(strict_types=1);

namespace Aeon\Automation\GitHub;

use Aeon\Calendar\Gregorian\DateTime;

final class PullRequest
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function number() : int
    {
        return $this->data['number'];
    }

    public function url() : string
    {
        return $this->data['html_url'];
    }

    public function title() : string
    {
        return $this->data['title'];
    }

    public function description() : string
    {
        return $this->data['body'] ?? $this->data['title'];
    }

    public function date() : DateTime
    {
        return ($this->data['merged_at'] !== null) ? DateTime::fromString($this->data['merged_at']) : DateTime::fromString($this->data['updated_at']);
    }

    public function user() : string
    {
        return $this->data['user']['login'];
    }

    public function userUrl() : string
    {
        return $this->data['user']['html_url'];
    }

    public function isMerged() : bool
    {
        return $this->data['merged_at'] !== null;
    }

    public function hasMilestone() : bool
    {
        return isset($this->data['milestone']);
    }
}
