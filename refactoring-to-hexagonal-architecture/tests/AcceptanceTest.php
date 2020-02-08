<?php

declare(strict_types=1);


use App\BirthdayService;
use App\OurDate;
use PHPUnit\Framework\TestCase;

class AcceptanceTest extends TestCase
{
    const SMTP_PORT = 25;
    private $service;

    public function setUp(): void
    {
        $this->service = new BirthdayService();
    }

    public function testWillNotSendEmailsWhenNobodysBirthday()
    {
        $this->service->sendGreetings(
            dirname(__FILE__) . "/resources/employee_data.txt",
            new OurDate("2008/01/01"),
            "localhost",
            self::SMTP_PORT);
        $this->assertEquals(
            0,
            $messagesSent->size(),
            "what? messages?");
    }

}