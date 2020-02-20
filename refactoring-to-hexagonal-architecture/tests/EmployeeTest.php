<?php

declare(strict_types=1);

use App\Employee;
use App\OurDate;
use PHPUnit\Framework\TestCase;

class EmployeeTest extends TestCase
{
    public function testBirthday(){
        $employee = new Employee("foo", "bar", "a@b.c", $this->createDate('1990/01/31'));
        $this->assertFalse($employee->isBirthday(new OurDate($this->createDate('2008/01/30'))), "not his birthday");
        $this->assertTrue($employee->isBirthday(new OurDate($this->createDate('2008/01/31'))), "his birthday");
    }

    public function testExceptionInCreationObject()
    {
        $this->expectException(\ArgumentCountError::class);
        $invalidDate = new Employee("");
    }

    public function testEquality(){
        $base = new Employee("First", "Last", "first@last.com", $this->createDate('1999/09/01'));
        $same = new Employee("First", "Last", "first@last.com", $this->createDate('1999/09/01'));
        $different = new Employee("First", "Last", "boom@boom.com", $this->createDate('1999/09/01'));

        $this->assertTrue($base->equals($same));
        $this->assertFalse($base->equals($different));
    }


    private function createDate(string $yyyyMMdd): DateTime
    {
        return DateTime::createFromFormat('Y/m/d', $yyyyMMdd);
    }
}
