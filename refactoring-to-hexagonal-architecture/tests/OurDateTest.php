<?php

declare(strict_types=1);

use App\OurDate;
use PHPUnit\Framework\TestCase;

class OurDateTest extends TestCase
{

    public function testGetters()
    {
        $OurDate = new OurDate('1789/01/24');
        $this->assertEquals(1, $OurDate->getMonth());
        $this->assertEquals(24, $OurDate->getDay());
    }

    public function testIsSameDate()
    {
        $OurDate = new OurDate('1789/01/24');
        $sameDay = new OurDate('2001/01/24');
        $notSameDay = new OurDate('1789/01/25');
        $notSameMonth = new OurDate('1789/02/25');

        $this->assertTrue($OurDate->isSameDay($sameDay), 'same');
        $this->assertFalse($OurDate->isSameDay($notSameDay), 'not same day');
        $this->assertFalse($OurDate->isSameDay($notSameMonth), 'not same month');
    }

    public function testEquality()
    {
        $base = new OurDate("2000/01/02");
        $same = new OurDate("2000/01/02");
        $different = new OurDate("2000/01/04");

        $this->assertTrue($base->equals($base));
        $this->assertTrue($base->equals($same));
        $this->assertFalse($base->equals($different));
    }

    public function testExceptionInCreationObject()
    {
        $this->expectException(InvalidArgumentException::class);
        $invalidDate = new OurDate("");
        $anotherInvalidDate = new OurDate();
    }
}
