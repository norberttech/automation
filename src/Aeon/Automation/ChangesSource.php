<?php declare(strict_types=1);

namespace Aeon\Automation;

use Aeon\Calendar\Gregorian\DateTime;

interface ChangesSource
{
    public function id() : string;

    public function url() : string;

    public function title() : string;

    public function date() : DateTime;

    public function description() : string;

    public function user() : string;

    public function userUrl() : string;

    public function equals(self $source) : bool;
}
