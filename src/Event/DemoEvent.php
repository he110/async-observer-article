<?php

declare(strict_types=1);

namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;

class DemoEvent extends Event
{
    private string $someString;

    public function __construct(string $someData)
    {
        $this->someString = $someData;
    }

    public function getSomeString(): string
    {
        return $this->someString;
    }
}
