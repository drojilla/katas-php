<?php

declare(strict_types=1);


namespace App;


use DateTime;

class OurDate
{

    private DateTime $date;

    public function __construct($yyyyMMdd)
    {
//        try{
        $this->date = DateTime::createFromFormat('yyyy/MM/dd', $yyyyMMdd);
//        }catch (){
//            throws ParseException
//        }
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

    public function equals(?OurDate $ourDate): bool
    {
        if (!($ourDate instanceof self)) {
            return false;
        }

        return $ourDate->date === $this->date;
    }
}
