<?php

declare(strict_types=1);


namespace App;


class BirthdayService
{
    public function sendGreetings(
        string $fileName,
        OurDate $ourDate,
        string $smtpHost,
        int $smtpPort
    ): void
    {
        $fileHandler = fopen($fileName, 'rb');
        fgetcsv($fileHandler);
        while ($employeeData = fgetcsv($fileHandler, null)) {
            $employeeData = array_map('trim', $employeeData);
            $employee = new Employee($employeeData[1], $employeeData[0], $employeeData[2], $employeeData[3]);
            if ($employee->isBirthday($ourDate)) {
                $recipient = $employee->getEmail();
                $body = sprintf('Happy Birthday, dear %s!', $employee->getFirstName());
                $subject = 'Happy Birthday!';
                $this->sendMessage($smtpHost, $smtpPort, 'sender@here.com', $subject, $body, $recipient);
            }
        }
    }

    private function sendMessage(
        string $smtpHost,
        int $smtpPort,
        string $sender,
        string $subject,
        string $body,
        string $recipient
    ): void
    {

//        // Create a mailer
//        $mailer = new Swift_Mailer(
//            new Swift_SmtpTransport($smtpHost, $smtpPort)
//        );
//        // Construct the message
//        $msg = new Swift_Message($subject);
//        $msg
//            ->setFrom($sender)
//            ->setTo([$recipient])
//            ->setBody($body)
//        ;
//        // Send the message
//        $mailer->send($msg);
    }

}