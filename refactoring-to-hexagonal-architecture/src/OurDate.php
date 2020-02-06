<?php

declare(strict_types=1);


namespace App;


use DateTime;

class OurDate
{

    private DateTime $date;

    public function __construct(string $yyyyMMdd)
    {
        try {
            $this->date = DateTime::createFromFormat('Y/m/d H:i:s', $yyyyMMdd . ' 00:00:00');
        } catch (\Throwable $e) {
            throw new \InvalidArgumentException('ParseException');
        }
    }

    public function getDay(): int
    {
        return (int)$this->date->format('d');
    }

    public function getMonth(): int
    {
        return (int)$this->date->format('m');
    }

    public function isSameDay(OurDate $anotherDate): bool
    {
        return
            $anotherDate->getDay() === $this->getDay()
            && $anotherDate->getMonth() === $this->getMonth();
    }

    public function equals(OurDate $ourDate): bool
    {
        if (!($ourDate instanceof OurDate)) {
            return false;
        }

        return $ourDate->date->getTimestamp() === $this->date->getTimestamp();
    }
}
