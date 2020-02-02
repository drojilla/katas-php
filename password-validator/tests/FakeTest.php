<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class FakeTest extends TestCase
{
    public function testFails()
    {
        $this->assertTrue(false);
    }
}