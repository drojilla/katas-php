<?php
declare(strict_types=1);


namespace App;


class CsvEmployeeRepository implements EmployeeRepository
{
    private string $fileName;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }

    public function findByBirthday(OurDate $date): array
    {
        $fileHandler = fopen($this->fileName, 'r');
        fgetcsv($fileHandler);
        $employees = [];
        while ($employeeData = fgetcsv($fileHandler, null, ',')) {
            $employeeData = array_map('trim', $employeeData);

            $employee = new Employee($employeeData[1], $employeeData[0], $employeeData[2], $employeeData[3]);
            $employees[] = $employee;
        }

        $employees = array_filter($employees, function (Employee $employee) use ($date) {
            return $employee->isBirthday($date);
        });

        return $employees;
    }
}