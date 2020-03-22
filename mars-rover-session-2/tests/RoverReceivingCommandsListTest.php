<?php

declare(strict_types=1);

use App\Rover;
use PHPUnit\Framework\TestCase;

class RoverReceivingCommandsListTest extends TestCase
{
    public function testNoCommands(): void
    {
        $rover = new Rover(0, 0, "N");

        $rover->receive("");

        $this->assertEquals(new Rover(0, 0, "N"), $rover);
    }

    public function testTwoCommands(): void
    {
        $rover = new Rover(0, 0, "N");

        $rover->receive("lf");

        $this->assertEquals(new Rover(-1, 0, "W"), $rover);
    }

    public function testManyCommands(): void
    {
        $rover = new Rover(0, 0, "N");

        $rover->receive("ffrbbrfflff");

        $this->assertEquals(new Rover(0, 0, "E"), $rover);
    }

}