<?php

declare(strict_types=1);

use App\Rover;
use PHPUnit\Framework\TestCase;

class RoverPositionTest extends TestCase
{
    public function testFacingNorthMoveForward()
    {
        $rover = new Rover(0, 0, "N");

        $rover->receive("f");

        $this->assertEquals(new Rover(0, 1, "N"), $rover);
    }

    public function testFacingNorthMoveBackward()
    {
        $rover = new Rover(0, 0, "N");

        $rover->receive("b");

        $this->assertEquals(new Rover(0, -1, "N"), $rover);
    }

    public function testFacingSouthMoveForward()
    {
        $rover = new Rover(0, 0, "S");

        $rover->receive("f");

        $this->assertEquals(new Rover(0, -1, "S"), $rover);
    }

    public function testFacingSouthMoveBackward()
    {
        $rover = new Rover(0, 0, "S");

        $rover->receive("b");

        $this->assertEquals(new Rover(0, 1, "S"), $rover);
    }

    public function testFacingWestMoveForward()
    {
        $rover = new Rover(0, 0, "W");

        $rover->receive("f");

        $this->assertEquals(new Rover(-1, 0, "W"), $rover);
    }

    public function testFacingWestMoveBackward()
    {
        $rover = new Rover(0, 0, "W");

        $rover->receive("b");

        $this->assertEquals(new Rover(1, 0, "W"), $rover);
    }

    public function testFacingEastMoveForward()
    {
        $rover = new Rover(0, 0, "E");

        $rover->receive("f");

        $this->assertEquals(new Rover(1, 0, "E"), $rover);
    }

    public function testFacingEastMoveBackward()
    {
        $rover = new Rover(0, 0, "E");

        $rover->receive("b");

        $this->assertEquals(new Rover(-1, 0, "E"), $rover);
    }
}
