<?php

namespace App\Interfaces;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Collection;

interface EmployeeRepositoryInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Employee;
    public function getTasksByEmployee(int $employeeId): Collection;

}

