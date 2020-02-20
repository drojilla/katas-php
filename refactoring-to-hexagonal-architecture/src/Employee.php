<?php

declare(strict_types=1);


namespace App;


use DateTime;

class Employee
{
    private OurDate $birthDate;
    private string $lastName;
    private string $firstName;
    private string $email;

    public function __construct(string $firstName, string $lastName, string $birthDate, string $email, DateTime $date = null)
    {
        try {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->birthDate = new OurDate($birthDate, $date);
            $this->email = $email;
        } catch (\Throwable $e) {
            throw new \ArgumentCountError('Invalids arguments');
        }

    }

    public function isBirthday(OurDate $today)
    {
        return $today->isSameDay($this->birthDate);
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function equals(Employee $employee): bool
    {
        if ($this == $employee) {
            return true;
        }

        if (null === $employee) {
            return false;
        }

        if (!($employee instanceof self)) {
            return false;
        }

        if (null === $this->birthDate) {
            if (null !== $employee->birthDate) {
                return false;
            }
        } elseif (!$this->birthDate->equals($employee->birthDate)) {
            return false;
        }

        if (null === $this->email) {
            if (null !== $employee->email) {
                return false;
            }
        } elseif ($this->email !== $employee->email) {
            return false;
        }

        if (null === $this->firstName) {
            if (null !== $employee->firstName) {
                return false;
            }
        } elseif ($this->firstName !== $employee->firstName) {
            return false;
        }

        if (null === $this->lastName) {
            if (null !== $employee->lastName) {
                return false;
            }
        } elseif (!$this->lastName !== $employee->lastName) {
            return false;
        }

        return true;
    }
}
