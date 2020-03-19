<?php

declare(strict_types=1);

namespace App\TextConverter;

class HtmlTextConverter
{
    private string $fileName;

    public function __construct(string $fullFilenameWithPath)
    {
        $this->fileName = $fullFilenameWithPath;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function convertToHtml(string $htmlFile): void
    {
        $textFile = fopen($this->fileName, 'r');
        $htmlFile = fopen($htmlFile, 'w');
        fwrite($htmlFile, '<body>');
        while ($line = fgets($textFile)) {
            $line = $this->escapeText($line);

            fwrite($htmlFile, $line);
            fwrite($htmlFile, '<br />');
        }

        fwrite($htmlFile, '</body>');
        fclose($textFile);
    }

    public static function escapeText(string $text): ?string
    {
        $text = trim($text);
        $text = str_replace('&', '&amp;', $text);
        $text = str_replace('<', '&lt;', $text);
        $text = str_replace('>', '&gt;', $text);
        $text = str_replace('\'', '&quot;', $text);
        $text = str_replace('"', '&quot;', $text);
        return $text;
    }
}
