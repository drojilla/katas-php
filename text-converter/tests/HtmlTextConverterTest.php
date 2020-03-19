<?php

declare(strict_types=1);

use App\TextConverter\HtmlTextConverter;
use PHPUnit\Framework\TestCase;

class HtmlTextConverterTest extends TestCase
{
    public function textToEscape(): array
    {
        return [
            ['sometextwith', '  sometextwith   '],
            ['sometextwith &lt;', 'sometextwith <'],
            ['sometextwith &gt;', 'sometextwith >'],
            ['sometextwith &amp;', 'sometextwith &'],
            ['sometextwith &quot;', 'sometextwith "'],
            ['sometextwith &quot;', 'sometextwith \''],
        ];
    }

    /** @dataProvider textToEscape
     * @param string $expectedText
     * @param string $actualText
     */
    public function testEscapingText(
        string $expectedText,
        string $actualText
    ): void {
        $actualText = HtmlTextConverter::escapeText($actualText);
        $this->assertEquals($expectedText, $actualText);
    }
}
