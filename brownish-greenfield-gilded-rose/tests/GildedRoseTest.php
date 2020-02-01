<?php

declare(strict_types=1);

use App\GildedRose;
use App\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testFixMe()
    {
        $item = new Item('foo', 1, 3);
        $inventory = new GildedRose($item);

        $inventory->updateQuality();

        $this->assertEquals($item->name, 'anotherFoo');
    }
}
