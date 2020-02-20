<?php

declare(strict_types=1);


namespace App;


interface Sender
{
    public function send(Message $message): void;

}