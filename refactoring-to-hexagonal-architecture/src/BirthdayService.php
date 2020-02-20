<?php

declare(strict_types=1);


namespace App;


use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class BirthdayService
{
    const SENDER_EMAIL = 'sender@here.com';
    const EMAIL_BODY_TEMPLATE = 'Happy Birthday, dear %s!';
    const EMAIL_SUBJECT = 'Happy Birthday!';
    private EmployeeRepository $employeeRepository;
    private ?Sender $sender;

    public function __construct(EmployeeRepository $employeeRepository, Sender $sender = null)
    {
        $this->employeeRepository = $employeeRepository;
        $this->sender = $sender;
    }

    public function sendGreetings(
        OurDate $date,
        string $smtpHost,
        int $smtpPort
    ): void
    {
        $employees = $this->employeeRepository->findByBirthday($date);

        $this->sendEmails($smtpHost, $smtpPort, $employees);
    }

    private function sendEmails($smtpHost, $smtpPort, array $employees): void
    {
        foreach ($employees as $employee) {
            $recipient = $employee->getEmail();
            $body = sprintf(self::EMAIL_BODY_TEMPLATE, $employee->getFirstName());
            $this->sendMessage($smtpHost, $smtpPort, self::SENDER_EMAIL, self::EMAIL_SUBJECT, $body, $recipient);
        }
    }

    protected function sendMessage(
        string $smtpHost,
        int $smtpPort,
        string $sender,
        string $subject,
        string $body,
        string $recipient
    ): void
    {
        $mailer = new Swift_Mailer(
            new Swift_SmtpTransport($smtpHost, $smtpPort)
        );
        $msg = new Swift_Message($subject);
        $msg->setFrom($sender)
            ->setTo([$recipient])
            ->setBody($body);

        $message = new Mail();

        $this->send($msg, $mailer, $message);
    }

    protected function send(
        Swift_Message $msg,
        Swift_Mailer $mailer,
        Message $message)
    {
        $mailer->send($msg);
        $this->sender->send($message);
    }

}
