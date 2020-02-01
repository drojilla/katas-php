<?php

declare(strict_types=1);


namespace App;


class HotChocolate implements Beverage
{
    public function price():float
    {
        return 1.45;
    }
}
