<?php

declare(strict_types=1);

use App\Rover;
use PHPUnit\Framework\TestCase;

class RoverEqualityTest extends TestCase
{
    public function testEqualRovers(): void
    {
        $this->assertEquals(new Rover(1, 1, "N"), new Rover(1, 1, "N"));
    }

    public function testNotEqualRovers(): void
    {
        $this->assertFalse((new Rover(1, 1, "N"))->equals(new Rover(1, 1, "S")));
        $this->assertFalse((new Rover(1, 1, "N"))->equals(new Rover(1, 2, "N")));
        $this->assertFalse((new Rover(1, 1, "N"))->equals(new Rover(0, 1, "N")));
    }
}
