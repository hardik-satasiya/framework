<?php

use Illuminate\Console\Scheduling\Event;

class EventTest extends PHPUnit_Framework_TestCase
{
    public function testBuildCommand()
    {
        $event = new Event('php -i');

        $this->assertSame('php -i > /dev/null 2>&1 &', $event->buildCommand());
    }

    public function testBuildCommandAppendOutput()
    {
        $event = new Event('php -i');

        $event->appendOutputTo('/dev/null');
        $this->assertSame('php -i >> /dev/null 2>&1 &', $event->buildCommand());
    }
}
