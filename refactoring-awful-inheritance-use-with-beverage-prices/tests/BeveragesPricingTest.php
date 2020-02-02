<?php

declare(strict_types=1);

use App\Coffee;
use App\HotChocolate;
use App\Tea;
use App\WithCinnamon;
use App\WithCream;
use App\WithMilk;
use PHPUnit\Framework\TestCase;

class BeveragesPricingTest extends TestCase
{
    public function testComputesCoffeePrice()
    {
        $coffee = new Coffee();
        $this->assertEquals(1.20, $coffee->price());
    }

    public function testComputesTeaPrice()
    {
        $tea = new Tea();
        $this->assertEquals(1.50, $tea->price());
    }

    public function testComputesHotChocolatePrice()
    {
        $hotChocolate = new HotChocolate();
        $this->assertEquals(1.45, $hotChocolate->price());
    }

    public function testComputesTeaWithMilkPrice()
    {
        $teaWithMilk = new WithMilk(new Tea());
        $this->assertEquals(1.60, $teaWithMilk->price());
    }

    public function testComputesCoffeeWithMilkPrice()
    {
        $coffeeWithMilk = new WithMilk(new Coffee());
        $this->assertEquals(1.30, $coffeeWithMilk->price());
    }

    public function testComputesCoffeeWithMilkAndCreamPrice()
    {
        $coffeeWithMilkAndCream = new WithMilk(new WithCream(new Coffee()));
        $this->assertEquals(1.45, $coffeeWithMilkAndCream->price());
    }

    public function testComputesHotChocolateWithCreamPrice()
    {
        $hotChocolateWithCream = new WithCream(new HotChocolate());
        $this->assertEquals(1.60, $hotChocolateWithCream->price());
    }

    public function testComputesAnyBeverageWithCinnamonPrice()
    {
        $teaWithCinnamon = new WithCinnamon(new Tea());
        $this->assertEquals(1.55, $teaWithCinnamon->price());
    }

}
