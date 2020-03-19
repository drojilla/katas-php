<?php

declare(strict_types=1);

namespace App\text_converter;

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
            $line = trim($line);
            $line = str_replace('&', '&amp;', $line);
            $line = str_replace('<', '&lt;', $line);
            $line = str_replace('>', '&gt;', $line);

            fwrite($htmlFile, $line);
            fwrite($htmlFile, '<br />');
        }

        fwrite($htmlFile, '</body>');
        fclose($textFile);
    }
}
