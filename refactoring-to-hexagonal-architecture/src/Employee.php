<?php

declare(strict_types=1);


namespace App;


class Employee
{
    private OurDate $birthDate;
    private string $lastName;
    private string $firstName;
    private string $email;

    public function __construct(string $firstName, string $lastName, string $birthDate, string $email)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthDate = new OurDate($birthDate);
        $this->email = $email;
    }

    public function isBirthday(OurDate $today)
    {
        return $today->isSameDay($this->birthDate);
    }

    public function equals(Employee $same)
    {

    }
    


}
