<?php

declare(strict_types=1);

use App\text_converter\HtmlTextConverter;
use PHPUnit\Framework\TestCase;

class HtmlTextConverterTest extends TestCase
{
    public function testToChange()
    {
        $htmlTextConverter = new HtmlTextConverter("");
        $this->assertTrue(false);
    }
}