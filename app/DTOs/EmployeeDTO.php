<?php

namespace App\DTOs;

use App\Models\Employee;

class EmployeeDTO
{
    public int $id;
    public string $name;
    public string $email;

    public function __construct(int $id, string $name, string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public static function fromModel(Employee $employee): self
    {
        return new self(
            $employee->id,
            $employee->name,
            $employee->email
        );
    }
}

