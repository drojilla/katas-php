<?php

declare(strict_types=1);


use App\BirthdayService;
use App\OurDate;
use PHPUnit\Framework\TestCase;

class AcceptanceTest extends TestCase
{
    private const SMTP_HOST = '127.0.0.1';
    private const SMTP_PORT = 25;

    private $service;

    protected function setUpt(): void
    {
        $this->service = $this->createMock(BirthdayService::class);
        $this->service
            ->expects($this->any())
            ->method('sendMessage')
            ->willReturn(null);
    }

    private function messagesSent(array $response): array
    {
        return $response;
    }

    public function testWillSendGreetings_whenItsSomebodysBirthday(): void
    {
        $this->service->sendGreetings(
            dirname(__FILE__) . '/resources/employee_data.txt',
            new OurDate('2008/10/08'),
            static::SMTP_HOST,
            static::SMTP_PORT
        );

        $response = [

        ];
        $messages = $this->messagesSent($response);
        $this->assertCount(1, $messages, 'message not sent?');

        $message = $messages[0];
        $this->assertEquals('Happy Birthday, dear John!', $message['Content']['Body']);
        $this->assertEquals('Happy Birthday!', $message['Content']['Headers']['Subject'][0]);
        $this->assertCount(1, $message['Content']['Headers']['To']);
        $this->assertEquals('john.doe@foobar.com', $message['Content']['Headers']['To'][0]);
    }

    public function testWillNotSendEmailsWhenNobodysBirthday(): void
    {
        $this->service->sendGreetings(
            dirname(__FILE__) . '/resources/employee_data.txt',
            new OurDate('2008/01/01'),
            static::SMTP_HOST,
            static::SMTP_PORT
        );

        $this->assertCount(0, $this->messagesSent([]), 'what? messages?');
    }
}
