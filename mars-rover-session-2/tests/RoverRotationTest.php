<?php

declare(strict_types=1);

use App\Rover;
use PHPUnit\Framework\TestCase;

class RoverRotationTest extends TestCase
{
    public function testFacingNorthRotateLeft()
    {
        $rover = new Rover(0, 0, "N");

        $rover->receive("l");

        $this->assertEquals(new Rover(0, 0, "W"), $rover);
    }

    public function testFacingNorthRotateRight()
    {
        $rover = new Rover(0, 0, "N");

        $rover->receive("r");

        $this->assertEquals(new Rover(0, 0, "E"), $rover);
    }

    public function testFacingSouthRotateLeft()
    {
        $rover = new Rover(0, 0, "S");

        $rover->receive("l");

        $this->assertEquals(new Rover(0, 0, "E"), $rover);
    }

    public function testFacingSouthRotateRight()
    {
        $rover = new Rover(0, 0, "S");

        $rover->receive("r");

        $this->assertEquals(new Rover(0, 0, "W"), $rover);
    }

    public function testFacingWestRotateLeft()
    {
        $rover = new Rover(0, 0, "W");

        $rover->receive("l");

        $this->assertEquals(new Rover(0, 0, "S"), $rover);
    }

    public function testFacingWestRotateRight()
    {
        $rover = new Rover(0, 0, "W");

        $rover->receive("r");

        $this->assertEquals(new Rover(0, 0, "N"), $rover);
    }

    public function testFacingEastRotateLeft()
    {
        $rover = new Rover(0, 0, "E");

        $rover->receive("l");

        $this->assertEquals(new Rover(0, 0, "N"), $rover);
    }

    public function testFacingEastRotateRight()
    {
        $rover = new Rover(0, 0, "E");

        $rover->receive("r");

        $this->assertEquals(new Rover(0, 0, "S"), $rover);
    }
}
