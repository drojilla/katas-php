<?php

declare(strict_types=1);

namespace App;

class Item
{
    static public string $name;
    static public int $quality;
    static public int $sellIn;

    public function __construct(string $name, int $quality, int $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

}