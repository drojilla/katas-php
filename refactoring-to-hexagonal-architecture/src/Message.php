<?php

declare(strict_types=1);


namespace App;


interface Message
{

    public function subject(): string ;

    public function sender(): string ;

    public function recipients(): array ;

    public function body(): string ;


}