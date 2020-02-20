<?php

namespace App;

interface EmployeeRepository
{
    public function findByBirthday(OurDate $date): array;
}