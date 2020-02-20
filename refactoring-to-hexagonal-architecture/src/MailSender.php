<?php

declare(strict_types=1);


namespace App;


use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class MailSender implements Sender
{
    private Swift_Mailer $mailer;

    public function __construct(string $smtpHost, int $smtpPort)
    {
        $this->mailer = new Swift_Mailer(
            new Swift_SmtpTransport($smtpHost, $smtpPort)
        );
    }

    public function send(Message $message): void
    {
        $msg = new Swift_Message($message->subject());
        $msg->setFrom($message->sender())
            ->setTo($message->recipients())
            ->setBody($message->body());

        $this->mailer->send($msg);
    }


}