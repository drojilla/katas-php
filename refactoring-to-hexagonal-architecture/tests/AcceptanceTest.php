<?php

declare(strict_types=1);

use App\BirthdayService;
use App\OurDate;
use PHPUnit\Framework\TestCase;

class AcceptanceTest extends TestCase
{
    private const SMTP_HOST = '127.0.0.1';
    private const SMTP_PORT = 25;
    private BirthdayService $service;

    protected function setUp(): void
    {
        $this->service = new class() extends BirthdayService {
            private array $messageSent = [];

            protected function send(Swift_Message $msg, Swift_Mailer $mailer): void
            {
                $this->messageSent[] = $msg;
            }

            public function count(): int
            {
                return count($this->messageSent);
            }

            public function get(int $index): Swift_Message
            {
                return $this->messageSent[$index];
            }
        };
    }

    public function testWillSendGreetings_whenItsSomebodysBirthday(): void
    {
        $this->service->sendGreetings(
            dirname(__FILE__) . '/resources/employee_data.txt',
            new OurDate('2008/10/08'),
            static::SMTP_HOST,
            static::SMTP_PORT
        );

        $this->assertEquals(1, $this->service->count(), 'message not sent?');
        /** @var Swift_Message $message */
        $message =  $this->service->get(0);
        $this->assertEquals('Happy Birthday, dear John!', $message->getBody());
        $this->assertEquals('Happy Birthday!', $message->getSubject());
        $this->assertEquals('john.doe@foobar.com', key($message->getTo()));
    }

    public function testWillNotSendEmailsWhenNobodysBirthday(): void
    {
        $this->service->sendGreetings(
            dirname(__FILE__) . '/resources/employee_data.txt',
            new OurDate('2008/01/01'),
            static::SMTP_HOST,
            static::SMTP_PORT
        );

        $this->assertEquals(0, $this->service->count(), 'what? messages?');
    }
}
