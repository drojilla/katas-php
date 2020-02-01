<?php

declare(strict_types=1);

use App\Coffee;
use App\CoffeeWithMilk;
use App\CoffeeWithMilkAndCream;
use App\HotChocolate;
use App\HotChocolateWithCream;
use App\Tea;
use App\TeaWithMilk;
use PHPUnit\Framework\TestCase;

class BeveragesPricingTest extends TestCase
{
    public function testComputesCoffeePrice()
    {
        $coffee = new Coffee();
        $this->assertEquals(1.20, $coffee->price());
    }

    public function testComputes_tea_price()
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
        $teaWithMilk = new TeaWithMilk();
        $this->assertEquals(1.60, $teaWithMilk->price());
    }

    public function testComputesCoffeeWithMilkPrice()
    {
        $coffeeWithMilk = new CoffeeWithMilk();
        $this->assertEquals(1.30, $coffeeWithMilk->price());
    }

    public function testComputesCoffeeWithMilkAndCreamPrice()
    {
        $coffeeWithMilkAndCream = new CoffeeWithMilkAndCream();
        $this->assertEquals(1.45, $coffeeWithMilkAndCream->price());
    }

    public function testComputesHotChocolateWithCreamPrice()
    {
        $hotChocolateWithCream = new HotChocolateWithCream();
        $this->assertEquals(1.60, $hotChocolateWithCream->price());
    }

}
